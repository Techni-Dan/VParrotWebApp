<p align="center">
<a href="#">
		<img width="300" src="public/images/logo.png" alt="Garage Vincent Parrot">
</a>
<br><br>
</p>

[![fr](https://img.shields.io/badge/lang-fr-blue.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.md)
[![en](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.en.md)
[![ro](https://img.shields.io/badge/lang-ro-yellow.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.ro.md)

# Auto Repair Shop Vincent PARROT web app

<a href="https://github.com/Techni-Dan/VParrotWebApp/blob/main/LICENSE">
<img src ="https://img.shields.io/github/license/Techni-Dan/VParrotWebApp" />
</a>
<a href="https://github.com/Techni-Dan/VParrotWebApp/issues">
<img src ="https://img.shields.io/github/issues/Techni-Dan/VParrotWebApp" />
</a><br><br>

Link to the online version of the project: [Cilck here](https://vparrotwebapp.technidan.com)

The Auto Repair Vincent Parrot project is a web application created for an evaluation during training.

## Features

Business manager Vincent Parrot has an administrator account that allows him to manage user accounts for employees (creation, modification, viewing, deletion), manage changes to the repair services section on the home page (creation, modification, visualization, deletion), to manage changes to the opening/closing schedule of the auto repair shop present in each page of the website in the footer of the page.

The website clearly and concisely displays the various car repair services offered by the auto repair shop on the homepage.

The website presents used vehicles available for sale, with photos, detailed descriptions and technical information.

A system of filters facilitates the search for vehicles by adjusting the results according to a price range, number of kilometers traveled or year of registration.

Only employees have the ability to: add, modify, view and delete used cars offered for sale on the website.

Employees have the ability to: add, edit, view, delete testimonials as well as moderate visitor testimonials to avoid inappropriate or offensive content before posting these testimonials on the home page.

The connection to the space dedicated to the administration is done via an e-mail address and a password from the same connection form for both types of users.

Visitors to the website have the option of contacting the garage at any time, by telephone or by filling out an online contact form.

Contact information, including the form, is also visible at the bottom of each used vehicle ad with the subject of the form automatically adjusted based on the title of the vehicle ad.

## Setting up the working environment

- device: [Apple Mac Mini - Apple M2 Pro](https://www.apple.com/newsroom/2023/01/apple-introduces-new-mac-mini-with-m2-and-m2-pro-more-powerful-capable-and-versatile-than-ever/)

- operating system: [macOS Sonoma 14.3](https://developer.apple.com/documentation/macos-release-notes/macos-14_3-release-notes)

- IDE: [Visual Studio Code 1.86.0](https://code.visualstudio.com/)

- IDE: [PhpStorm 2023.3.2](https://www.jetbrains.com/phpstorm/download)

- version control system: [Git version 2.43.0](https://git-scm.com/)

- local webserver: [XAMPP 8.2.4-0](https://www.apachefriends.org/download.html)

- general purpose scripting language: [PHP 8.3.2](https://www.php.net/downloads)

- dependency management in PHP: [Composer version 2.6.5](https://getcomposer.org/download/)

- developer tool to build, run, and manage your Symfony applications: [Symfony CLI version 5.8.6](https://symfony.com/download)

- JavaScript runtime: [Node.js 20.11.0](https://nodejs.org/en/download)

- npm Node.js Package Manager: [npm 10.4.0](https://docs.npmjs.com/try-the-latest-stable-version-of-npm)

- npx package runner: [npx 10.4.0](https://www.npmjs.com/package/npx)

- package manager: [yarn 1.22.19](https://classic.yarnpkg.com/lang/en/docs/install/)

- web browser: [Google Chrome 121.0.6167.85](https://www.google.com/intl/en/chrome/)

## Installation

You can clone this repository to create a local copy on your computer:

```bash
git clone git@github.com:Techni-Dan/VParrotWebApp.git
```
In order to use a MySQL database you should enable the driver in php.ini on your device if it's not already enabled.
Uncomment "extension=php_pdo_mysql.dll" in your php.ini file

After configuring the work environment you can proceed to installing the necessary components. You need to open the cloned project in your IDE. In the terminal of your IDE you must go to the folder of the newly created project after the cloning if it is not already the case:

```bash
cd VParrotWebApp
```

With this command, in the terminal you install the dependencies of the project present in [composer.json](composer.json):

```bash
composer install
```

If composer is not installed on your work environment, you will find at this address information allowing you to install it:

- [https://getcomposer.org/download/](https://getcomposer.org/download/)

With this command, in the terminal you install the dependencies of the project present in [yarn.lock](yarn.lock):

```bash
yarn
```

If yarn is not installed on your work environment, you will find information at this address allowing you to install it:

- [https://classic.yarnpkg.com/lang/en/docs/install/](https://classic.yarnpkg.com/lang/en/docs/install/)

If node.js is not installed on your work environment, you will find information at this address allowing you to install it:

- [https://nodejs.org/en/download](https://nodejs.org/en/download)

In the [.env](.env) file  we must define the information concerning the access to the database. DBHOST="127.0.0.1" -> the IP address, DBPORT="3306" -> the port number, DBNAME="VParrotWebApp" -> the database name, DATABASE_PASSWORD="" -> without password in local network, MYSQL_DB_USER="root" -> for the user.

```bash
DBHOST="127.0.0.1"
DBPORT="3306"
DBNAME="VParrotWebApp"
#DATABASE_PASSWORD=""
MYSQL_DB_USER="root"
```

You must start the Apache Web Server and MySQL Database servers in the XAMPP application in the Manage Servers section

With this command, in the terminal of your IDE, you create the VParrotWebApp database

```bash
symfony console doctrine:database:create
```

With this command, in the terminal you create the migration of entities:

```bash
symfony console make:migration
```

With this command, in the terminal, you perform the migration to the database:

```bash
symfony console doctrine:migration:migrate
```

With this command, in the terminal of your IDE, you install certificates to be able to browse in https:

```bash
symfony server:ca:install
```

You can open phpMyAdmin in your browser to view the new database.
[http://127.0.0.1/phpmyadmin/index.php?route=/](http://127.0.0.1/phpmyadmin/index.php?route=/)

It is necessary to insert in the database in the employes table an employee with the roles = ["ROLE_ADMIN"] and a hashed password for Vincent Parrot.

With this command, in your IDE's terminal, you can hash a password:

```bash
symfony console security:hash-password
```

Symfony returns the hashed password to you, you must copy it.

In phpMyAdmin in dbparrot database, in employee table in sql tab, you need to insert employee replacing \_hash_password\_ with the password you copied, you can replace admin@gmail.com by an e-mail address of your choice, it will serve as the login ID for the Parrot Vincent administrator.

```bash
INSERT INTO `employes` (`id`, `nom`, `prenom`, `email`, `roles`, `password`) VALUES
(1, 'Parrot', 'Vincent', 'admin@email.com', '[\"ROLE_ADMIN\"]', '_hash_password_');
```

The $roles attribute of the [Employes](/src/Entity/Employes.php) entity is initialized with the value ["ROLE_EMPLOYE"], so each time an Employee is created, the role is predefined and it cannot be changed in the create a new employee section by the administrator. The change can only be made in the database via phpMyAdmin.

At the time of connection according to the role, the user is redirected to the administration space concerning him.

Regarding the sending of data from contact forms, the application uses the sending of e-mails. These data are not saved in the database.

To do this, you must have a Gmail address, with [Two-Step Verification Enabled](https://myaccount.google.com/signinoptions/two-step-verification) on the account and add a [ security key for the app](https://myaccount.google.com/two-step-verification/security-keys).

Then in the [.env](.env) file at MAILER_DSN=gmail://USERNAME:PASSWORD@default you must replace the USERNAME with your Gmail username and the PASSWORD with the security key that you have created.

In the files [ContactController.php](/src/Controller/ContactController.php) line number 37 and [OccasionsController.php](/src/Controller/OccasionsController.php) line 110 you must replace test@gmail.com with your e-mail address.

With this command, in the terminal of your IDE, you start the development server:

```bash
npx encore dev-server --hot
```

With this command, in a new terminal of your IDE, you launch Symfony's internal server in the background:

```bash
symfony serve -d
```

The Symfony server informs you that it is listening at the address https://127.0.0.1:8000
You can open this link in your browser.

You now have the possibility to connect to the administration section with the account created for Vincent PARROT and to add identifiers for employees, the opening/closing schedule of the auto repair shop, the car repair services offered by the auto repair shop.

By logging in with an employee ID you will be able to add used cars for sale, add, moderate and approve testimonials.

With this command, in the terminal of your IDE, you stop the Symfony internal server:

```bash
symfony server:stop
```

To stop the development server, use the command Control+C for MacOS or CTRL+C for Windows.

**Note:**

> This is a web application in development mode and not a web application in production mode.

## Fixtures

Fixtures in the context of this Symfony project are predefined test data used to populate the database with fictitious information, simulating the application's operation in a development environment. They are particularly useful for assessing the application's proper functioning, testing various features, and ensuring data consistency. The fixture files are located in the [/src/DataFixtures/](/src/DataFixtures) directory.

The [VehiculeFixtures.php](/src/DataFixtures/VehiculeFixtures.php) file is responsible for creating 800 vehicle entries, each generated with random data using the Faker library. This data includes details such as price, year of registration, mileage, description, options, and more. Vehicles are randomly associated with brands, models, categories, fuels, types, and employees, providing a variety of realistic data.

The [MarqueFixtures.php](/src/DataFixtures/MarqueFixtures.php) file creates instances of the Marque class with predefined brand names, saving each instance in the database. It also registers a reference for each brand, allowing them to be retrieved in other fixtures.

The [ModeleFixtures.php](/src/DataFixtures/ModeleFixtures.php) file is responsible for creating instances of the Modele class, associated with specific brands. It uses the references created by MarqueFixtures.php to establish relationships between brands and models.

The [CategorieFixtures.php](/src/DataFixtures/CategorieFixtures.php) file creates instances of the Categorie class, representing vehicle categories such as Car, Motorcycle, Truck, and Utility. Each category is persisted in the database with a unique reference, facilitating their use in other fixtures.

The [CarburantFixtures.php](/src/DataFixtures/CarburantFixtures.php) file creates instances of the Carburant class, representing different types of fuels such as Diesel, Petrol, Hybrid, etc. These instances are also saved in the database.

The [TypeFixtures.php](/src/DataFixtures/TypeFixtures.php) file generates data for the Type class, representing vehicle types such as 4x4, Sedan, Estate, etc. The types are added to the database with unique references for easy access in other fixtures.

The [ServiceFixtures.php](/src/DataFixtures/ServiceFixtures.php) file creates entries for garage services, detailing different types of repairs and maintenance offered. Each service comes with a detailed description, a list of specific items, and an illustrative image. These services reflect the garage's skills and expertise in body repair, mechanics, as well as regular vehicle maintenance.

The [EmployesFixtures.php](/src/DataFixtures/EmployesFixtures.php) file generates 10 employee accounts, each associated with a name, first name, email address, password, and assigned to the 'ROLE_EMPLOYEE' role. These fictional accounts simulate the presence of employees in the application and test features related to personnel management.

The [HoraireFixtures.php](/src/DataFixtures/HoraireFixtures.php) file creates fictional opening hours for the garage, detailing opening and closing hours for each day of the week. These schedules provide a simulated representation of the periods during which the garage is open to the public, allowing testing of features related to visit scheduling.

The [TemoignageFixtures.php](/src/DataFixtures/TemoignageFixtures.php) file is a fixtures class used to populate the database with fictional testimonial data when loaded. This fixtures file randomly generates testimonials with fictional names, comments, and ratings, and persists them in the database. This can be useful for having realistic testimonial data during development or testing.

Each of these files is used to create specific datasets in the database, and they are interconnected through created references. 

To load this data into the database, if it is not already done, you must create the database with the command:

```bash
php bin/console doctrine:database:create
```
create the migration with the command:

```bash
symfony console make:migration
```

migrate to the database with the command:

```bash
symfony console doctrine:migration:migrate
```

load the fixtures into the database with the command:

```bash
php bin/console doctrine:fixtures:load
```

This creates a coherent set of data for development and testing.

Overall, these fixtures contribute to making the application development more efficient by providing consistent and diversified data for different entities of the application, facilitating testing and feature validation.

You can launch the application. Among other data, users have been inserted into the database:
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, password: test
2. Employe1 Prenom1, ROLE_EMPLOYE, email: user1@email.com, password: test.

**Note:**

Link to the online version of the project with 1 000 vehicles recorded in the database using fixtures: [Click here](https://vparrotwebapptest.technidan.com).

## Database SQL insertion

### Example 1:
To test the application, if you wish, you can populate the database with the sample data presented in the [VParrotWebApp.sql](/resources/VParrotWebApp.sql) file.
This file was generated by PhpMyAdmin after the database was populated via the application administration interface.

To do this, you must start the Apache Web Server and MySQL Database Server in the Manage Servers section in the XAMPP application if this is not already done and then in an internet browser open [http://127.0.0.1/phpmyadmin/index.php](http://127.0.0.1/phpmyadmin/index.php) and select the VParrotWebApp database and then select the Import tab, click on the Choose file button and select the VParrotWebApp.sql file from your project directory /VParotWebApp/resources/ and then click on the Import button.

Once the import is complete, you can launch the application. Among other data, two users have been inserted into the database:
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, password: test
2. DOE John, ROLE_EMPLOYE, email: user1@email.com, password: test.

### Example 2:

The file [schema.sql](/resources/schema.sql) was written by hand and allows you to create the VParrotWebAppOne database and insert data into this database via PhpMyAdmin.

To do this, you must start the Apache Web Server and MySQL Database Server in the Manage Servers section in the XAMPP application if this is not already done and then in an internet browser open [http://127.0.0.1/phpmyadmin/index.php](http://127.0.0.1/phpmyadmin/index.php) and then select the Import tab, click on the Choose file button and select the schema.sql file from your project directory /VParotWebApp/resources/ and then click on the Import button.

Once the import is complete, you can launch the application. Among other data, two users have been inserted into the database:
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, password: test
2. DOE John, ROLE_EMPLOYE, email: user1@email.com, password: test.

To be able to launch the application, you must first modify the name of the database in the [.env](/.env) file on line 33, DBNAME="VParrotWebAppOne".

## API

An API, or Application Programming Interface, is a set of rules and protocols that enable communication between two distinct software applications. It defines the methods and data formats that applications can use to request and exchange information. An API acts as a bridge, allowing different applications to work together cohesively.

The [VehiculesController.php](/src/Controller/Api/VehiculesController.php) controller exposes three routes for interacting with vehicle data.

### GET /api/vehicules - List of all vehicles:
This route returns the complete list of all available vehicles.

- **Method** : GET
- **Parameters** : None
- **Response** : A JSON array containing vehicle information.
- **Usage Example** : GET /api/vehicules
  
### GET /api/vehiculesby - List of vehicles with pagination:
This route retrieves a paginated list of vehicles, with pagination options.

- **Method** : GET
- **Parameters** : page - Page number to retrieve (default is 1).
- **Response** : A JSON array containing vehicle information, the current page, the number of items per page, and the total item count.
- **Usage Example** : GET /api/vehiculesby?page=2

### GET /api/vehicules/{id} - Details of a specific vehicle:
This route retrieves the details of a specific vehicle using its identifier.

- **Method** : GET
- **Parameters** : id - Vehicle identifier.
- **Response** : A JSON object containing the details of the requested vehicle.
- **Usage Example** : GET /api/vehicules/2

Each route uses the JSON format for the response, and the data is serialized using the "getVehicules" serialization group. Paginated information is also included in the response for the route that supports pagination (GET /api/vehiculesby). These routes provide a simple yet powerful API for retrieving information about the project's vehicles.

## Diagrams

[Class diagram](/resources/Class_diagram.jpg)

[Use case diagram](/resources/Diagramme%20de%20cas%20d'utilisation.jpg)

[Sequence diagram 1](/resources/Diagramme_de_sequence.jpg)

[Sequence diagram 2](/resources/Diagramme%20de%20sequence_2.jpg)