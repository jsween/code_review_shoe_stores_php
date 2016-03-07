# _Shoe Store App, Code Review 4 PHP_

#### _Week 4 Code Review of PHP - 3.7.2016_

### By _**Jon Sweeney**_

## Description

_The objective of this week's code review is to build a simple web application with php, Silex, and mySQL._

_This web app is designed to list out local shoe stores and the brands of shoes they carry. The information can be created, read, updated and deleted. The data is stored in a mySQL database._

## Setup/Installation Requirements

1. _Fork and clone this repository from_ [gitHub](https://github.com/jsween/code_review_shoe_stores_php.git).
2. Navigate to the root directory of the project in the CLI shell you are using and run the command: __composer install__ .
3. Create a local server in the /web directory within the project folder using the command: __php -S localhost:8000__ .
4. Open the directory http://localhost:8000 in any standard web browser.
5. Launch MAMP and access mySQL by entering __/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot__ .

## SQL Commands used to Setup database

> CREATE DATABASE shoes;

> USE shoes;

> CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR(55));

> CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR(55));

> CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id INT, brand_id INT);

## Known Bugs

_Unable to store names of clients and stylists when using an apostrophe._

## Support and contact details

_Contact the author through_ [gitHub](https://github.com/jsween/code_review_shoe_stores_php.git).

## Technologies Used

_This web application was created using the_  [Silex micro-framework](http://silex.sensiolabs.org/)_, as well _[Twig](http://twig.sensiolabs.org/), a template engine for php.

### License

MIT License.

Copyright (c) 2016 **_Jon Sweeney_**
