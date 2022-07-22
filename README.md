# randstrad-movehq
# Test Project for Randstrad and MoveHQ

#### The initial step was done using the "New Repository" function in GitHub, which automatically created this README.md file.

#### The overall structure of this progam will use Drupal as a framework, and its Quick Start function to create a working local development web site, using PHP's built-in web browser, rather than using an external server and Apache2, which would be used for production.

*I have always liked Drupal, I find the structure very clear and understandable and the code very readable.*

From the Drupal web page describing the Quick Start process, [Drupal Quick Start Command](https://www.drupal.org/docs/installing-drupal/drupal-quick-start-command), we are told: `Important: the quick-start command is intended only for launching a local demo version of Drupal. If you need to install Drupal for production use, see instructions in the rest of this guide.`

The procedure described there is as follows.  I will be using these commands to "fill in" the base code in this repository.

### Drupal Quick Start Steps

#### Step 1 - install PHP

*I assume that PHP is already installed in the developer's machine.

#### Step 2 - download and run Drupal
```
mkdir drupal && cd drupal && curl -sSL https://www.drupal.org/download-latest/tar.gz | tar -xz --strip-components=1
php -d memory_limit=256M ./core/scripts/drupal quick-start demo_umami
```
*Note 1: in this project, we will not actually start Drupal until needed.

*Note 2: ( From the web page ): Note: If you cloned the code via Git instead of using the tarball, make sure to run ```composer install``` prior to running the quick-start command.

#### Done

###### More to come

#### I have also added a Docs subdirectory to contain various related documentation
