# Project Setup for Randstrad and MoveHQ

#### The initial step was done using the "New Repository" function in GitHub, which automatically created a 'README.md' file, along with '.gitignore' and 'LICENSE.md' files.

As I mentioned earlier, the overall structure of this progam will use Drupal as a framework, with modifications; its Quick Start function will create a working local development web site, using PHP's built-in web browser, rather than using an external server and Apache2, which would be used for production.


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
git add Docs/* .ht.router.php INSTALL.txt
git push
```

After checking the repository, I added the rest of the code.

```
git add *
git push
```

Before running the command to start the PHP local server, I installed the required `php7.4-pdo-sqlite` module, and ran:

```
php -d memory_limit=256M ./core/scripts/drupal quick-start demo_umami
```

The `core/scripts/drupal quick-start` script created a database and did other tasks required to support a running Drupal site.

In a production environment, I would choose PostgreSQL, but could use MySQL or MariaDB as well.

The `core/scripts/drupal quick-start` script also opened a browser window with a one-time login, instructing me to change the `admin` password, which I did.


Although the Drupal Quick Start process creates six other users, I also created a 'regular' user for our purposes, called 'randstad-movehq'.


Next, I created a PHP program to create a simple table in the existing database, holding a list of books.  This [program](create_books.php) is placed in the Docs directory, because it does not properly fit in the Drupal code base.



