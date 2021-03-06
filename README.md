# Bladeinsight - PHP Assignment

This project has the purpose of presenting the assignment
requested by Bladeinsight. 

It consisted in an API that create, read, update and delete the data related at turbines for bladeinsight.


## Requirements

![](https://img.shields.io/badge/Code-PHP-informational?style=flat&logo=php&logoColor=white&color=purple)
![](https://img.shields.io/badge/Database-MySQL-informational?style=flat&logo=mysql&logoColor=white&color=6aa6f8)
![](https://img.shields.io/badge/Server-Apache-informational?style=flat&logo=apache&logoColor=white&color=red)
![](https://img.shields.io/badge/OS-Mac-informational?style=flat&logo=macos&logoColor=white&color=green)

- PHP 7.4 and above.


## Installation
For running this project, you need to install `php-assignment` library and the dependencies. It can be done by this methods:


### 1. Clone the repo

Clone `piglesiastecnologia/php-assignment` repository, use the SSH to connect with this GIT:

```
git clone git@github.com:<user>/php-assignment.git
```

### 2. Composer

Inside the project folder, use the composer to install all dependecies.
You can install the library via [Composer](https://getcomposer.org/). If you don't already have Composer installed, first install it by following one of these instructions depends on your OS of choice:
* [Composer installation instruction for Windows](https://getcomposer.org/doc/00-intro.md#installation-windows)
* [Composer installation instruction for Mac OS X and Linux](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

After composer is installed, Then run the following command to install the PHP Assignment library:

```
php composer.phar install
```

### 3. Database

Inside the directory Database have a sql statements to create the database to work, search for: `00-initial.sql`
And configure the host access inside:
- `app/`config.php

### 4. Start the project

If use the native PHP use this command:
```
php -S localhost:8000 -t public/
```

### 5. Tests

This project have the PHPUnit test framework available to test the application.
Take a look at the folder `tests` and you will see:

- `app/`UsersControllerTest.php
- `app/`TurbineControllerTest.php

Inside each file, has some tests to perform and see the application running


Thank you for the interest.