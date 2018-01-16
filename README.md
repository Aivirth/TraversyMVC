# Mini PHP framework

Mini PHP framework created by [Brad Traversy](https://github.com/bradtraversy) through his udemy course. Customized by me and used as base for integrating and testing new technologies.

### Disclaimer

It's not advisable to use this for live projects as this is still an alpha project I'm using to learn and exercise.
If you are inclined to help with bugs corrections and developing new features you are free to do so.

## Getting Started

Copy the project in your folder and install the database dump in your PhpMyAdmin.
Follow the instructions to complete the installation.

### Prerequisites

* Apache Server
* PHP 5.6+
* Node.js
* Mysql Database


Install [XAMPP](https://www.apachefriends.org/it/index.html) for an easy quickstart


### Config File

Modify the app/config/config.php file according to your needs. You can use example.config.php file inside the same folder as an example based on my local settings.

```
//Database Configuration
define('DB_HOST', '<databaseHost>');
define('DB_USER', '<databaseUser>');
define('DB_PASS', '<databasePassword>');
define('DB_NAME', '<databaseName>');
```

Modify it like this

```
//Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'shareposts');
```

### htaccess file

Modify che .htaccess file inside the public folder to match the name of your installation folder

### Install the Database

Create a database of your choice in PhpMyAdmin and import the traversy_mvc.sql file in it.

### Install node dependencies

Run the following command inside the same folder where is present the package.json file.

```
npm install
```


## Built With

* PHP
* Node
* Bootstrap CSS 4.0


## Authors

* **Brad Traversy** - *Initial work* - [Brad Traversy](https://github.com/bradtraversy)

See also the list of [contributors](https://github.com/Aivirth/TraversyMVC/graphs/contributors) who participated in this project.

## License

This project is licensed under the MIT License

## Objectives

* Javascript functionality in views
* Basic userfriendly CMS setup similar to wordpress for backend
* Media Gallery
* Vue.js implementation
* Conversion to BulmaCSS
* MaterializeCSS fork
* React.js fork
* Webpack implementation
