# Esseker

This is the official repository of the Esseker project.

## Requirements

1. PHP 7.4
2. Node 16 (LTS)
3. MySQL 8
4. [Node.js](https://nodejs.org/en/)
5. [Composer](https://getcomposer.org/)
6. [WP-CLI](https://wp-cli.org/)

## Project setup and branching

The `main` branch should always be deployable and is usually denoting the production branch. Every feature (assignment) should be done in a separate branch, and you should create pull requests (PR) towards the `main` branch.

### Change config

When adding the `wp-config.php`, make sure you include the `wp-config-project.php` file. You should add it after the `$table_prefix` variable:

```php
define('WP_ENVIRONMENT_TYPE', '');

if (php_sapi_name() !== 'cli') {
	require_once 'wp-config-project.php';
}
```

Your local `WP_ENVIRONMENT_TYPE` should be set to `developmenta`.

### Quality checks

Make sure to change the workflow file of the automatic [quality checks](/.github/workflows/quality.yml#L13) on GitHub actions so that your theme name is placed instead of the `academy-theme` placeholder (or name your theme as `academy-theme`).

Every time you make a PR the automatic checks will trigger and will check your code for PHP, JS and SCSS code violations.
