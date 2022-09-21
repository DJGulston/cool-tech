# cool-tech

This is a Laravel project that allows the user to search for and read articles from their own MySQL database. The user may search for articles via tags, categories or article names.

----------------------------------------------------------------------------------------------------------------------------------------

## Table Of Contents

1. Installation Guide
2. How to use the project
3. Credit To Authors

----------------------------------------------------------------------------------------------------------------------------------------

## Installation Guide

To install this project, go to the following link [cool-tech](https://github.com/DJGulston/cool-tech), and download the code files. Note that you must maintain the same file structure when you download the files.

Since this is a Laravel project, you will have to ensure that you install [Composer](https://getcomposer.org/doc/00-intro.md). Once Composer is installed, you can install Laravel using the following command:
composer global require laravel/installer

In addition to Laravel and Composer, you must install [PHP](https://www.php.net/) and [MySQL](https://dev.mysql.com/downloads/installer/) on your machine.

Once everything is installed, ensure that you enable the following extensions in your php.ini file: mysqli, pdo_mysql, mb_string and open_ssl.
Once enabled, restart your PC so the changes can be implemented.

If any problems persist, ensure that you disable the fileinfo extension in your php.ini file.

Once Laravel is ready, you may create a Laravel project using the following command:
composer create-project --prefer-dist laravel/laravel cool-tech

Note that you do not have to name the project cool-tech. You may name it anything you like.

Once the project is created, add the code files you downloaded to your project using the same file structure.

To get your project working with MySQL, you must create a Laravel database and a Laravel user with the necessary permissions granted using the following commands:
CREATE DATABASE laravel;
CREATE USER 'laravel'@'localhost' identified by 'Laravel123';
GRANT ALL ON laravel.* TO 'laravel'@'localhost';

Note that the username does not have to be 'laravel' and the password does not have to be 'Laravel123'. You may change to whatever to prefer.

To ensure that your project works with your newly created Laravel database, modify the following properties in your .env file:
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=Laravel123

----------------------------------------------------------------------------------------------------------------------------------------

## How to use the project

To use this project, you must first add the article information to your database. To do this, execute the cool-tech.sql in your MySQL terminal.

Now, open a command terminal, navigate to the root directory of your Laravel project and run the following command to execute your Laravel project:
php artisan serve

Next, open your browser and type localhost:8000 in the URL field at the top. You should see the homepage for the website.

Now that you're on your homepage, you may click on any of the latest articles, or you may navigate to the Search page and search for articles via a tag, category or name. You may also view the Terms Of Use or Privacy Policy pages.

## Credit To Authors

[Dean Gulston](https://github.com/DJGulston)
