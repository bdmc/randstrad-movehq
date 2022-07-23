# Project Setup for Randstrad and MoveHQ

#### The initial step was done using the "New Repository" function in GitHub, which automatically created a 'README.md' file, along with a '.gitignore' and 'LICENSE.md' files.

As I mentioned earlier, the overall structure of this progam will use Drupal as a framework, with modifications to its Quick Start function will create a working local development web site, using PHP's built-in web browser, rather than using an external server and Apache2, which would be used for production.


#### The steps used to create this project from the initial Git repositiory are as follows:

```
git clone https://github.com/bdmc/randstrad-movehq.git
cd randstrad-movehq
mkdir Docs
curl -sSL https://www.drupal.org/download-latest/tar.gz | tar -xz --strip-components=1
```

According to the instructions, I needed to run ```composer install``` next.

```
composer install
```

This failed, requiring that I install certain PHP packages before continuing.  Only one, `php7.4-gd`, was not already installed in my system, and was required for `composer install` to run successfully.

*Note: I am using PHP version 7.4 for this project.  I have several versions of PHP installed in my system.



At this point, I did the first commit of the Drupal code.


```
php -d memory_limit=256M ./core/scripts/drupal quick-start demo_umami
```
