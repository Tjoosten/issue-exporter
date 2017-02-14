<?php

namespace Tjoosten\Github\Issues\Commands;

use Parsedown;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Tjoosten\Github\Issues\Utils\Github;

/**
 * Class ExportCommand.
 *
 * @package Tjoosten\Github\Issues\Commands
 */
class ExportFileCommand extends Command
{
    /**
     * Command configuration.
     *
     * @return int|void|null
     */
    protected function configure()
    {
        $this->setName('issues:clone-file');
        $this->setDescription('Clone the repository issues locally.');

        $this->addArgument('user', InputArgument::REQUIRED, 'Repository owner');
        $this->addArgument('repo', InputArgument::REQUIRED, 'The GitHub repository');
        $this->addArgument('path', InputArgument::REQUIRED, 'Path where to place the tickets');
    }

    /**
     * Command logic
     *
     * // TODO: Document feature.
     * // TODO: Set move operations for the assets.
     * // TODO: Set function that wipe out the path argument. To clear all the previous issues.
     * // TODO: Set input password hidden. The password is now visible.
     *
     * @param   InputInterface  $input
     * @param   OutputInterface $output
     * @return  Void|int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question'); // Load the helper.

        // Questions
        $question_user = new Question('GitHub user:');
        $question_pass = new Question('GitHub pass:');
        $question_method = new ChoiceQuestion('Authencation method: (default: auth_http_password)', [
            'auth_url_token', 'auth_url_client_id', 'auth_http_token', 'auth_http_password', 'auth_jwt'
        ], 0);

        // Data variables.
        $user = $helper->ask($input, $output, $question_user);
        $password = $helper->ask($input, $output, $question_pass);
        $method = $helper->ask($input, $output, $question_method);

        $creator = $input->getArgument('user');
        $repo = $input->getArgument('repo');
        $path = $input->getArgument('path');

        // Start quering the GitHub API wrapper.
        $githubApi = new Github();
        $githubData = $githubApi->authencate($user, $password, $method)->getIssues($creator, $repo);
        // End querying the GitHub api wrapper.

        // Start writing the html files.
        $progress = new ProgressBar($output, count($githubData));
        $markdown = new Parsedown();
        $ioStyle = new SymfonyStyle($input, $output);

        if (is_dir($path) == false) { // Directory doesn't exists. So create one.
            mkdir($path);
        }

        foreach ($githubData as $issue) {
            $timestamp = date('F j, Y, g:i a', strtotime($issue['created_at']));

            $template = file_get_contents(__DIR__ . '/../stubs/issue-template/template.html');
            $template = str_replace('{{ TITLE }}', $issue['title'], $template);
            $template = str_replace('{{ STATE }}', $issue['state'], $template);
            $template = str_replace('{{ BODY }}', $markdown->text($issue['body']), $template);
            $template = str_replace('{{ QUICKLINK }}', $issue['html_url'], $template);

            $template = str_replace('{{ CREATED_BY }}', $issue['user']['login'], $template);
            $template = str_replace('{{ CREATED_AT }}', $timestamp, $template);

            file_put_contents($path.DIRECTORY_SEPARATOR . 'issue-' . $issue['number'] . '.html', $template);
            $progress->advance();
        }

        $progress->finish();
        // END: Writing the html files.

        if (count($githubData) > 0) {
            // Output
            $ioStyle->newLine();
            $output->writeln("<info>INFO:</info> The issues are saved in the directory $path");
        }
    }
}
