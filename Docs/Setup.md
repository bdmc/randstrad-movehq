# Project Setup for Randstrad and MoveHQ

#### The initial step was done using the "New Repository" function in GitHub, which automatically created a 'README.md' file, along with '.gitignore' and 'LICENSE.md' files.

As I mentioned earlier, the overall structure of this program
will use Drupal as a framework, with modifications; its
Quick Start function will create a working local development
web site, using PHP's built-in web browser, rather than using
an external server and Apache2, which would be used for
production.

*NOTE: Drupal seems to keep replacing the root README.md file with its own content.  For that reason, 
I will place a copy of the original README.md [here](Docs/README.md).*

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

This failed, requiring that I install certain PHP packages
before continuing.  Only two, `php7.4-gd` and `php7.4-mbstring`,
were not already installed in my system, and were required
for `composer install` to run successfully.

*Note: I am using PHP version 7.4 for this project.  I have
several versions of PHP installed in my system.*



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

Before running the command to start the PHP local server, I
installed the required `php7.4-pdo-sqlite` module.

Looking at future needs, I also installed Drush, with:

```
composer require drush/drush
```

Once everything was ready I ran:

```
php -d memory_limit=256M ./core/scripts/drupal quick-start demo_umami
```

The `core/scripts/drupal quick-start` script created a
database and did other tasks required to support a running
Drupal site.


The `core/scripts/drupal quick-start` script also opened a
browser window with a one-time login, instructing me to
change the `admin` password, which I did.

After the initial Quick Start, you may use `php -d memory_limit=256M ./core/scripts/drupal server
` to re-start the local PHP server.  Each of those starts will
ask you to reset your password, but that is not necessary for
our purposes.

Although the Drupal Quick Start process creates six other users, I also created a 'regular' user for our purposes, called 'randstad-movehq'.


Next, I created a PHP program to create a simple table in the
existing database, holding a list of books.
This [program](create_books.php) is placed in the Docs
directory, because it does not properly fit in the Drupal
code base.


The next step was to create a custom module,
`randstrad_movehq_module`, to perform the tasks related to
the new Books table.

The code for this module is placed in files under
 `modules/custom/randstad_movehq_module` as specified in Drupal 9.
Two YAML files, `randstad_movehq_module.info.yml` and 
`randstad_movehq_module.routing.yml` control metadata and path 
information for the module.
The file `randstad_movehq_module.install` contains the structural
information for the new Books table, and is used during the 
module installation process.

Under the module directory, `modules/custom/randstad_movehq_module`,
is a `src` directory with `Controller` and `Form` subdirectories,
which contain the actual code for the module.

Enabling and activating the new module is done by
going to the web site.

From the Admin Dashboard, click on the Extend tab,
then search through the list of available modules to find
this "Randstrad MoveHQ Module", check the associated
checkbox, and then, at the bottom of the page, click
"Install".

