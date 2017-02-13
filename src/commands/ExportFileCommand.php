<?php

namespace Tjoosten\Github\Issues\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
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
    }

    /**
     * Command logic
     *
     * @param   InputInterface  $input
     * @param   OutputInterface $output
     * @return  Void|int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Data variables.
        $creator = $input->getArgument('user');
        $repo    = $input->getArgument('repo');
        $path    = $input->getArgument('path');

        // Start quering the GitHub API wrapper.
        $githubApi  = new Github();
        $githubData =  $githubApi->authencate($user, $password, $method)->getIssues($creator, $repo);
        // End querying the GitHub api wrapper.

        $output->writeln("<info>INFO:</info> The issues are saved in the directory $path");
    }
}