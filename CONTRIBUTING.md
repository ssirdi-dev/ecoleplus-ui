# Contributing to EcolePlus UI

Thank you for considering contributing to EcolePlus UI! This document outlines the process and guidelines for contributing to the project.

## Code of Conduct

This project and everyone participating in it is governed by our Code of Conduct. By participating, you are expected to uphold this code.

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check the issue list as you might find out that you don't need to create one. When you are creating a bug report, please include as many details as possible:

* Use a clear and descriptive title
* Describe the exact steps to reproduce the problem
* Provide specific examples to demonstrate the steps
* Describe the behavior you observed after following the steps
* Explain which behavior you expected to see instead and why
* Include screenshots if possible

### Suggesting Enhancements

Enhancement suggestions are tracked as GitHub issues. When creating an enhancement suggestion, please include:

* A clear and descriptive title
* A detailed description of the proposed functionality
* Explain why this enhancement would be useful
* List any similar features in other libraries if applicable
* Include mockups or examples if possible

### Pull Requests

* Fill in the required template
* Follow the Laravel coding standards
* Include tests for new features
* Update documentation for any changed functionality
* Ensure the test suite passes
* Include a proper commit message

## Development Setup

1. Fork the repository
2. Clone your fork
3. Install dependencies:

```bash
composer install
npm install
```

4. Create a branch for your changes:

```bash
git checkout -b feature/your-feature-name
```

5. Make your changes and ensure tests pass:

```bash
composer test
npm run test
```

## Coding Standards

* Follow PSR-12 coding standards
* Use type hints where possible
* Write descriptive commit messages
* Include PHPDoc blocks for new methods
* Add/update tests for changes
* Ensure proper documentation

## Testing

* Write tests for new features
* Update tests for modified features
* Ensure all tests pass before submitting PR
* Include both unit and feature tests where appropriate

## Documentation

* Update README.md if needed
* Add/update component documentation
* Include examples for new features
* Update TypeScript types if applicable

## Git Commit Messages

* Use the present tense ("Add feature" not "Added feature")
* Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
* Limit the first line to 72 characters or less
* Reference issues and pull requests liberally after the first line

## Additional Notes

### Issue and Pull Request Labels

* `bug` - Confirmed bugs or reports likely to be bugs
* `enhancement` - New feature or request
* `documentation` - Documentation only changes
* `tests` - Changes that are only related to testing
* `needs-tests` - Changes that need tests added
* `work-in-progress` - Pull requests that are not complete
* `needs-review` - Pull requests that need code review

## Questions?

Feel free to open an issue with your question or contact the maintainers directly. 