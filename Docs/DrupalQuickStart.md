## Drupal Quick Start



The overall structure of this progam uses Drupal as a framework, and its Quick Start function creates a working local development web site, using PHP's built-in web browser, rather than using an external server and Apache2, which would be used for production.

From the Drupal web page describing the Quick Start process, [Drupal Quick Start Command](https://www.drupal.org/docs/installing-drupal/drupal-quick-start-command), we are told: `Important: the quick-start command is intended only for launching a local demo version of Drupal. If you need to install Drupal for production use, see instructions in the rest of this guide.`


The procedure described there is as follows.  I will be using these commands to "fill in" the base code in this repository.


### Drupal Quick Start Steps

#### Step 1 - install PHP

*Note: I assume that PHP is already installed in the developer's machine.

#### Step 2 - download and run Drupal

```
mkdir drupal && cd drupal && curl -sSL https://www.drupal.org/download-latest/tar.gz | tar -xz --strip-components=1
php -d memory_limit=256M ./core/scripts/drupal quick-start demo_umami
```

*Note 1: in this project, we will not actually start Drupal until needed.

*Note 2: ( From the web page ): Note: If you cloned the code via Git instead of using the tarball, make sure to run `composer install` prior to running the quick-start command.

#### This is the end of the Drupal Quick Start Steps


