# Contributing to Issue Exporter 

Looking to contribute something to Issue Exporter? **Here's how you can help.** 

Please take a moment to review this document in order to make contribution process easy and effective for everyone involved. 

Following these guidelines helps to communicate that you respect the time of the developer(s) managing and developing this open source project.
In return, they should reciprocate that respect in addressing your issue or assesing patches and features. 

## Using the issue tracker 

The issue tracker is the preferred channel for bug reports, features requests and submitting pull requests,
but please respect the following restrictions: 

- Please **do not** use the issue tracker for personal support requests.
- Please **do not** derail or troll issues. Keep the discussion on topic and respect the opinions of others. 
- Please **do not** post comments consisting solely of "+1" or ":thumbsup:". Use Github's "reactions" feature instead. We reserver the right to delete comments which violate this rule. 
- Please **do not** open issues or pull requests regarding 3th party libraries. (open them in its repository). 

## Issues and labels 

Our bug tracker utilizes several labels to help organize and identify issues. Here's what they represent and how we use them:

- `bug` - Label for indicating bugs that are confirmed.
- `chore` - Labels for small fixes like dependency update. 
- `design` - issues for improving or updating our designs.
- `discussion` - Issues only for discussion between maintainers and contributors.
- `docs` - Issues for improving or updating our documentation.
- `duplicate` - Used to indicate duplicated bug reports. 
- `enchancement` - Small improves for the application. Where no feature request is reported. 
- `feature` - Used for indicate feature requests. 
- `in progress` - Issues or feature requests where maintainers are working on. 
- `invalid` - Used to indicate issues where the maintainers cannot find the bug with reproduction steps. 
- `legal` - Isseus about legal stuff such as license.
- `on hold` - Issues that currently doesn't need actions. 
- `òptimization` - Used to indicate small issues where a ninja fix can be done. 
- `PR-dev` - Used to indicate a PR into the develop branch. 
- `PR-stable` - PR for a new release. 
- `question` - Issues where contributors ask questions. 
- `security` - Security related issues. 
- `ux` - Issues for updating or improving the user experience. 
- `watchlist` - Issues that currently ignored.
- `wontfix` - Issues that maintainers won't fix.

For a complete look at our labels, see the project labels page.

## Bug reports. 

A bug is a *demonstrable problem* that is caused by code in the repository. Good bug reports are extremely helpful, 
so thanks!

Guidelines for bug reports: 

- **Validate and lint your code** - Validate and lint your code to ensure your problem isn't caused by a simple error in your own code. 
- **Use the GitHub issue search** - check if the issue has already been reported. 
- **Check if the issue has been fixed** - try to reproduce it using the lastest `master` of `develop` branch in the repository.
- **Isolate the problem** - ideally create a reduced test case and a live example. 

A good bug report shouldn't leave other needed to chase you up for more information. Please try to be as detailed as possible
in your report. What is your environment? What steps will reproduce the issue? What browser(s) and OS experience the problem? 
Do others browsers show the bug differently? What would you expect to be the outcome? All these details will help people to fix any potential bugs. 

**Example:**

> Short and descriptive example bug report title
>
> A summary of the issue and the browser/OS environment in which it occurs. If
> suitable, include the steps required to reproduce the bug.
>
> 1. This is the first step
> 2. This is the second step
> 3. Further steps, etc.
>
> `<url>` - a link to the reduced test case
>
> Any other information you want to share that is relevant to the issue being
> reported. This might include the lines of code that you have identified as
> causing the bug, and potential solutions (and your opinions on their
> merits).

## Feature requests

Feature requests are welcome. But take a moment to find out whether your idea
fits with the scope and aims of the project. It's up to *you* to make a strong
case to convince the project's developers of the merits of this feature. Please
provide as much detail and context as possible.


## Pull requests

Good pull requests—patches, improvements, new features—are a fantastic
help. They should remain focused in scope and avoid containing unrelated
commits.

**Please ask first** before embarking on any significant pull request (e.g.
implementing features, refactoring code, porting to a different language),
otherwise you risk spending a lot of time working on something that the
project's developers might not want to merge into the project.

1. [Fork](https://help.github.com/fork-a-repo/) the project, clone your fork,
   and configure the remotes:

   ```bash
   # Clone your fork of the repo into the current directory
   git clone https://github.com/<your-username>/bootstrap.git
   # Navigate to the newly cloned directory
   cd bootstrap
   # Assign the original repo to a remote called "upstream"
   git remote add upstream https://github.com/twbs/bootstrap.git
   ```

2. If you cloned a while ago, get the latest changes from upstream:

   ```bash
   git checkout master
   git pull upstream master
   ```

3. Create a new topic branch (off the main project development branch) to
   contain your feature, change, or fix:

   ```bash
   git checkout -b <topic-branch-name>
   ```

4. Commit your changes in logical chunks. Please adhere to these [git commit
   message guidelines](http://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)
   or your code is unlikely be merged into the main project. Use Git's
   [interactive rebase](https://help.github.com/articles/interactive-rebase)
   feature to tidy up your commits before making them public.

5. Locally merge (or rebase) the upstream development branch into your topic branch:

   ```bash
   git pull [--rebase] upstream master
   ```

6. Push your topic branch up to your fork:

   ```bash
   git push origin <topic-branch-name>
   ```

7. [Open a Pull Request](https://help.github.com/articles/using-pull-requests/)
    with a clear title and description against the `master` branch.

**IMPORTANT**: By submitting a patch, you agree to allow the project owners to
license your work under the terms of the [MIT License](LICENSE) (if it
includes code changes) and under the terms of the
[Creative Commons Attribution 3.0 Unported License](docs/LICENSE)
(if it includes documentation changes).


## License

By contributing your code, you agree to license your contribution under the [MIT License](LICENSE).
By contributing to the documentation, you agree to license your contribution under the [Creative Commons Attribution 3.0 Unported License](LICENSE).
 
