<p align="center">
<a href="#">
		<img width="300" src="public/images/logo.png" alt="Garage Vincent Parrot">
</a>
<br><br>
</p>

[![fr](https://img.shields.io/badge/lang-fr-blue.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.md)
[![en](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.en.md)
[![ro](https://img.shields.io/badge/lang-ro-yellow.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.ro.md)


# Garage automobile Vincent PARROT web app



<a href="https://github.com/Techni-Dan/VParrotWebApp/blob/main/LICENSE">
<img src ="https://img.shields.io/github/license/Techni-Dan/VParrotWebApp" />
</a>
<a href="https://github.com/Techni-Dan/VParrotWebApp/issues">
<img src ="https://img.shields.io/github/issues/Techni-Dan/VParrotWebApp" />
</a><br><br>

Lien vers la version en ligne du projet: [Cliquez ici](https://vparrotwebapp.technidan.com)

Le projet Garage automobile Vincent Parrot c'est une application web réalisé pour une évaluation en cours de formation.

## Fonctionnalités

Le chef d'entreprise Vincent Parrot détient un compte administrateur qui lui permet de gérer les comptes utilisateurs pour les employés (creation, modification, visualisation, effacement), des gérer les modifications de la section services de réparation au niveau de la page d'accueil (creation, modification, visualisation, effacement), de gérer les modification au niveau de l'horaire d'ouverture/fermeture du garage present dans chaque page du site web dans le pied de la page.

Le site web affiche de manière claire et concise les différents services de réparation automobile proposés par le garage sur la page d'accueil.

Le site web présent les véhicules d'occasion disponibles à la vente, avec des photos, des descriptions détaillées et des informations techniques.

Un système de filtres facilite la recherche de véhicules en ajustant les résultats en fonction d'une fourchette de prix, d'un nombre de kilomètres parcourus ou d'une année de mise en circulation.

Seuls les employés ont la possibilité de: ajouter, modifier, visualiser et effacer les voitures d'occasion propose à la vente sur le site internet.

Les employés ont la possibilité de: ajouter, modifier, visualiser, effacer les témoignages ansi que de modérés les témoignages des visiteurs pour éviter tout contenu inapproprié ou offensant avant la publication sur la page d'accueil des ces témoignage.

L'connexion a l'espace dédié a l'administration se fait via une adresse e-mail et un mot de passe a partir du meme formulaire de connexion pour les deux type d'utilisateurs.

Les visiteurs du site internet ont la possibilité de contacter le garage à tout moment, par téléphone ou en remplissant un formulaire de contact en ligne.

Les informations de contact, formulaire compris, sont également visibles en bas de chaque annonce d'un véhicule d'occasion avec le sujet du formulaire automatiquement ajusté en fonction du titre de l'annonce du véhicule.

## Configuration de l'environnement de travail

- ordinateur: [Apple Mac Mini - Apple M2 Pro](https://www.apple.com/newsroom/2023/01/apple-introduces-new-mac-mini-with-m2-and-m2-pro-more-powerful-capable-and-versatile-than-ever/)

- système d'exploitation: [macOS Sonoma 14.3](https://developer.apple.com/documentation/macos-release-notes/macos-14_3-release-notes)

- IDE: [Visual Studio Code 1.86.0](https://code.visualstudio.com/)

- IDE: [PhpStorm 2023.3.2](https://www.jetbrains.com/phpstorm/download)

- système de contrôle de version: [Git version 2.43.0](https://git-scm.com/)

- serveur Web local: [XAMPP 8.2.4-0](https://www.apachefriends.org/download.html)

- langage de scripts généraliste: [PHP 8.3.2](https://formulae.brew.sh/formula/php)

- gestion des dépendances en PHP: [Composer version 2.6.5](https://getcomposer.org/download/)

- outil de développement pour créer, exécuter et gérer vos applications Symfony: [Symfony CLI version 5.8.6](https://symfony.com/download)

- moteur d'exécution JavaScript: [Node.js 20.11.0](https://nodejs.org/en/download)

- gestionnaire de paquets "npm" JavaScript Node.js: [npm 10.4.0](https://docs.npmjs.com/try-the-latest-stable-version-of-npm)

- npx exécution des paquets: [npx 10.4.0](https://www.npmjs.com/package/npx)

- gestionnaire de packages: [yarn 1.22.19](https://classic.yarnpkg.com/lang/en/docs/install/)

- navigateur Web: [Google Chrome 121.0.6167.85](https://www.google.com/intl/fr/chrome/)

## Installation

Vous pouvez cloner ce dépôt pour créer une copie locale sur votre ordinateur:

```bash
git clone git@github.com:Techni-Dan/VParrotWebApp.git
```
Pour utiliser une base de données MySQL, vous devez activer le pilote dans php.ini sur votre appareil s'il n'est pas déjà activé.
Décommentez "extension=php_pdo_mysql.dll" dans votre fichier php.ini.

Après la configuration de l'environnement du travail vous pouvez passer à l'installation des composants nécessaire. Vous devez ouvrir le projet cloné dans votre IDE. Dans le terminal de votre IDE vous devez vous rendre dans le dossier du projet nouvellement crée après le clonage si ce n'est pas deja le cas:

```bash
cd VParrotWebApp
```

Avec cette commande, dans le terminal vous installez les dépendances du projet présentes dans [composer.json](composer.json):

```bash
composer install
```

Si composer n'est pas installé sur votre environnement de travail vous trouvere a cette adresse des information vous permetant l'instalation:

- [https://getcomposer.org/download/](https://getcomposer.org/download/)

Avec cette commande, dans le terminal vous installez les dépendances du projet présentes dans [yarn.lock](yarn.lock):

```bash
yarn
```

Si yarn n'est pas installé sur votre environnement de travail vous trouvere a cette adresse des information vous permetant l'instalation:

- [https://classic.yarnpkg.com/lang/en/docs/install/](https://classic.yarnpkg.com/lang/en/docs/install/)

Si node.js n'est pas installé sur votre environnement de travail vous trouvere a cette adresse des information vous permetant l'instalation:

- [https://nodejs.org/en/download](https://nodejs.org/en/download)

Dans le fichie [.env](.env) on doit définir les informations concernant l'access a la base des données.
DBHOST="127.0.0.1" -> pour l'addresse IP locale, DBPORT="3306" -> pour le port utilisé, DBNAME="VParrotWebApp" -> le nom de la base de données, DATABASE_PASSWORD="" -> sans mot de passe en locale, MYSQL_DB_USER="root" -> pour le nom d'utilisateur.

```bash
DBHOST="127.0.0.1"
DBPORT="3306"
DBNAME="VParrotWebApp"
#DATABASE_PASSWORD=""
MYSQL_DB_USER="root"
```

Il faut démarrer les serveurs Apache Web Server et MySQL Database dans l'application XAMPP dans la section Manage Servers

Avec cette commande, dans le terminal de votre IDE, vous créez la base de données VParrotWebApp

```bash
symfony console doctrine:database:create
```

Avec cette commande, dans le terminal vous créez la migration des entites :

```bash
symfony console make:migration
```

Avec cette commande, dans le terminal, vous effectuez la migration vers la base de données :

```bash
symfony console doctrine:migration:migrate
```

Avec cette commande, dans le terminal de votre IDE, vous installez des certificats pour pouvoir naviguer en https :

```bash
symfony server:ca:install
```

Vous pouvez ouvrir phpMyAdmin dans votre navigateur pour visualiser la nouvelle base de données.
[http://127.0.0.1/phpmyadmin/index.php?route=/](http://127.0.0.1/phpmyadmin/index.php?route=/)

Il faut inserer dans la base de données au niveau de la table employes un employe avec le roles = ["ROLE_ADMIN"] et un mot de passe haché pour Vincent Parrot.

Avec cette commande, dans le terminal de votre IDE, vous pouvez hacher un mot de passe:

```bash
symfony console security:hash-password
```

Symfony vous renvoie le mot de passe haché, vous devez le copier.

Dans phpMyAdmin dans la base de données dbparrot, dans la table des employés dans l'onglet SQL, vous devez insérer l'employé en remplaçant \_mot_de_passe_haché\_ par le mot de passe que vous avez copié, vous pouvez remplacer admin@gmail.com par une adresse e-mail de votre choix, elle servira d'identifiant de connexion pour l'administrateur Parrot Vincent.

```bash
INSERT INTO `employes` (`id`, `nom`, `prenom`, `email`, `roles`, `password`) VALUES
(1, 'Parrot', 'Vincent', 'admin@email.com', '[\"ROLE_ADMIN\"]', '_mot_de_passe_haché_');
```

L'attribute $roles de l'entité [Employes](/src/Entity/Employes.php) est initialisé avec la valeur ["ROLE_EMPLOYE"], donc a chaque creation d'un Employes le role est prédéfini et il ne peut pas être changé dans la section de création d'un nouveau employe par l'administrateur. Le changement peut être realise seulement dans la base de données via phpMyAdmin.

Au moment de la connexion selon le rôle, l'utilisateur est redirigé vers l'espace d'administration le concernant.

Concernant l'envoie des données provenant des formulaires de contact l'application utilise l'envoi d'e-mails. Ces données ne sont pas enregistrées dans la base de données.

Pour ce faire, vous devez disposer d'une adresse Gmail, avec la [Validation en deux étapes Activée](https://myaccount.google.com/signinoptions/two-step-verification) sur le compte et il faut ajouter une [clé de sécurité pour l'application](https://myaccount.google.com/two-step-verification/security-keys).

Ensuite dans le fichier [.env](.env) au niveau du MAILER_DSN=gmail://USERNAME:PASSWORD@default vous devez remplacer l'USERNAME par votre nom d'utilisateur Gmail et le PASSWORD par votre clé de sécurité que vous avez crée.

Dans les fichiers [ContactController.php](/src/Controller/ContactController.php) ligne numero 37 et [OccasionsController.php](/src/Controller/OccasionsController.php) ligne 110 vous devez remplacer test@gmail.com avec votre adresse e-mail.

Avec cette commande, dans le terminal de votre IDE, vous démarrez le serveur de développement :

```bash
npx encore dev-server --hot
```

Avec cette commande, dans un nouveau terminal de votre IDE, vous lancez le serveur interne de Symfony en arrière-plan :

```bash
symfony serve -d
```

Le serveur Symfony vous informe qu'il est en écoute à l'adresse https://127.0.0.1:8000
Vous pouvez ouvrir ce lien dans votre navigateur.

Vous avez désormais la possibilité de vous connecter à l'espace d'administration avec le compte crée pour Vincent PARROT et d'ajouter des identifiants pour les employés, l'horaire d'ouverture/fermeture du garage, les services de réparation automobile proposés par le garage.

En vous connectant avec un identifiant d'un employe vous pourrez ajouter des voitures d'occasion pour la vente, d'ajouter, modérer et approuver des témoignages.

Avec cette commande, dans le terminal de votre IDE, vous arrêtez le serveur intern de Symfony :

```bash
symfony server:stop
```

Pour arrêter le serveur de développement, utilisez la commande Control+C pour MacOS ou CTRL+C pour Windows.

**Note:**

> Il s'agit d'une application web en mode développement et non pas d'une application web en mode production.

## Fixtures

Les fixtures dans le cadre de ce projet Symfony sont des données de test prédéfinies qui sont utilisées pour remplir la base de données avec des informations fictives, simulant ainsi le fonctionnement de l'application dans un environnement de développement. Elles sont particulièrement utiles pour évaluer le bon fonctionnement de l'application, tester différentes fonctionnalités, et assurer la cohérence des données. Les fichiers des fixtures se trouvent dans le dossier [/src/DataFixtures/](/src/DataFixtures/).

Le fichier [VehiculeFixtures.php](/src/DataFixtures/VehiculeFixtures.php) est responsable de la création de 800 entrées de véhicules, chacune étant générée avec des données aléatoires à l'aide de la bibliothèque Faker. Ces données incluent des détails tels que le prix, l'année de mise en circulation, le kilométrage, la description, les options, et plus encore. Les véhicules sont associés à des marques, modèles, catégories, carburants, types, et employés de manière aléatoire, offrant ainsi une diversité de données réalistes.

Le fichier [MarqueFixtures.php](/src/DataFixtures/MarqueFixtures.php) crée des instances de la classe Marque avec des noms de marques prédéfinis, enregistrant chaque instance dans la base de données. Il enregistre également une référence pour chaque marque, ce qui permet de les récupérer dans d'autres fixtures.

Le fichier [ModeleFixtures.php](/src/DataFixtures/ModeleFixtures.php) est responsable de la création d'instances de la classe Modele, associées à des marques spécifiques. Il utilise les références créées par MarqueFixtures.php pour établir les relations entre les marques et les modèles.

Le fichier [CategorieFixtures.php](/src/DataFixtures/CategorieFixtures.php) crée des instances de la classe Categorie, qui représente les catégories de véhicules, telles que Voiture, Moto, Camion et Utilitaire. Chaque catégorie est persistée dans la base de données avec une référence unique, facilitant ainsi l'utilisation de ces catégories dans d'autres fixtures.

Le fichier [CarburantFixtures.php](/src/DataFixtures/CarburantFixtures.php) crée des instances de la classe Carburant, représentant différents types de carburants tels que Diesel, Essence, Hybride, etc. Ces instances sont également enregistrées dans la base de données.

Le fichier [TypeFixtures.php](/src/DataFixtures/TypeFixtures.php) Ce fichier génère des données pour la classe Type, qui représente les types de véhicules tels que 4x4, Berline, Break, etc. Les types sont ajoutés à la base de données avec des références uniques pour un accès facile dans d'autres fixtures.

Le fichier [ServiceFixtures.php](/src/DataFixtures/ServiceFixtures.php) crée des entrées de services pour le garage, détaillant les différents types de réparations et d'entretiens proposés. Chaque service est accompagné d'une description détaillée, d'une liste d'éléments spécifiques, et d'une image illustrative. Ces services reflètent les compétences et l'expertise du garage dans la réparation de la carrosserie, la mécanique, ainsi que dans l'entretien régulier des véhicules.

Le fichier [EmployesFixtures.php](/src/DataFixtures/EmployesFixtures.php) génère 10 comptes d'employés, chacun associé à un nom, prénom, adresse e-mail, mot de passe, et attribué au rôle 'ROLE_EMPLOYE'. Ces comptes fictifs permettent de simuler la présence d'employés dans l'application et de tester les fonctionnalités liées à la gestion du personnel.

Le fichier [HoraireFixtures.php](/src/DataFixtures/HoraireFixtures.php) crée des horaires d'ouverture fictifs pour le garage, détaillant les heures d'ouverture et de fermeture pour chaque jour de la semaine. Ces horaires offrent une représentation simulée des périodes pendant lesquelles le garage est ouvert au public, permettant ainsi de tester les fonctionnalités liées à la planification des visites.

Le fichier [TemoignageFixtures.php](/src/DataFixtures/TemoignageFixtures.php) est une classe de fixtures utilisée pour peupler la base de données avec des données de témoignages fictifs lorsqu'elle est chargée. Ce fichier de fixtures génère de manière aléatoire des témoignages avec des noms, des commentaires et des notes fictifs, et les persiste dans la base de données. Cela peut être utile pour avoir des données de témoignages réalistes lors du développement ou des tests.

Chacun de ces fichiers sert à créer des jeux de données spécifiques dans la base de données, et ils sont interconnectés grâce aux références créées.

Pour charger ces données dans la base de données, si ce n'est pas déjà fait, vous devez créer la base de données avec la commande:

```bash
php bin/console doctrine:database:create
```
créez la migration avec la commande:

```bash
symfony console make:migration
```

migrez vers la base de données avec la commande:

```bash
symfony console doctrine:migration:migrate
```

chargez les fixtures dans la base de données avec la commande:

```bash
php bin/console doctrine:fixtures:load
```

Cela crée un ensemble cohérent de données pour le développement et les tests.

Dans l'ensemble, ces fixtures contribuent à rendre le développement de l'application plus efficace en fournissant des données cohérentes et diversifiées pour les différentes entités de l'application, facilitant ainsi les tests et la validation des fonctionnalités.

Vous pouvez lancer l'application. Parmi d'autres données, des utilisateurs ont été insérés dans la base de données :
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, mot de passe: test
2. Employe1 Prenom1, ROLE_EMPLOYE, email: user1@email.com, mot de passe: test .

**Note:**

> Lien vers la version en ligne du projet avec 1 000 vehicules enregistrées dans la base de données a l'aide de fixtures: [Cliquez ici](https://vparrotwebapptest.technidan.com)

> Si vous obtenez une erreur lors du chargement des fixtures, c'est probablement à cause de références des clés. Pour résoudre ce problème, vous devez supprimer la base de données et la migration, puis recréer la base de données, créer la migration, effectuer la migration, puis charger les fixtures.

## Insertion SQL dans la base de données

### Exemple 1:

Pour tester l'application, si vous le souhaitez, vous pouvez remplir la base de données avec les exemples de données présentés dans le fichier [VParrotWebApp.sql](/resources/VParrotWebApp.sql).
Ce fichier a été généré par PhpMyAdmin après le remplissage de la base de données via l'interface d'administration de l'application.

Pour cela, il faut démarrer les serveurs Apache Web Server et MySQL Database dans l'application XAMPP dans la section Manage Servers si ce n'est pas déjà fait et puis dans un navigateur internet ouvrir [http://127.0.0.1/phpmyadmin/index.php](http://127.0.0.1/phpmyadmin/index.php) et sélectionez la base de données VParrotWebApp et puis sélectionez l'onglet Importer,  cliquez sur le bouton Choisir un fichier et sélectionez le fichier VParrotWebApp.sql depuis le repertoire de votre projet /VParrotWebApp/resources/ et puis cliquez sur le bouton Importer. 

Une fois l'importation terminée, vous pouvez lancer l'application. Parmi d'autres données, deux utilisateurs ont été insérés dans la base de données :
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, mot de passe: test
2. DOE John, ROLE_EMPLOYE, email: user1@email.com, mot de passe: test .

### Exemple 2:

Le fichier [schema.sql](/resources/schema.sql) a été écrit à la main et permet de créer la base de données VParrotWebAppOne et d'insérer des données dans cette base de données via PhpMyAdmin.

Pour cela, il faut démarrer les serveurs Apache Web Server et MySQL Database dans l'application XAMPP dans la section Manage Servers si ce n'est pas déjà fait et puis dans un navigateur internet ouvrir [http://127.0.0.1/phpmyadmin/index.php](http://127.0.0.1/phpmyadmin/index.php) et sélectionez l'onglet Importer,  cliquez sur le bouton Choisir un fichier et sélectionez le fichier schema.sql depuis le repertoire de votre projet /VParrotWebApp/resources/ et puis cliquez sur le bouton Importer. 

Une fois l'importation terminée, vous pouvez lancer l'application. Parmi d'autres données, deux utilisateurs ont été insérés dans la base de données :
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, mot de passe: test
2. DOE John, ROLE_EMPLOYE, email: user1@email.com, mot de passe: test .

Pour pouvoir lancer l'application, vous devez au préalable modifier le nom de la base de données dans le fichier [.env](/.env) à la ligne 33, DBNAME="VParrotWebAppOne".

## API

Une API, ou Interface de Programmation Applicative (en anglais, Application Programming Interface), est un ensemble de règles et de protocoles qui permettent à deux logiciels distincts de communiquer entre eux. Elle définit les méthodes et les formats de données que les applications peuvent utiliser pour demander et échanger des informations. Une API agit comme un pont qui permet à différentes applications de travailler ensemble de manière cohérente.

Le contrôleur [VehiculesController.php](/src/Controller/Api/VehiculesController.php) expose trois routes pour interagir avec les données des véhicules.

### GET /api/vehicules - Liste de tous les véhicules :

Cette route renvoie la liste complète de tous les véhicules disponibles.
- **Méthode** : GET
- **Paramètres** : Aucun
- **Réponse** : Un tableau JSON contenant les informations des véhicules.
- **Exemple d'utilisation** : GET /api/vehicules

### GET /api/vehiculesby - Liste des véhicules avec pagination :

Cette route permet de récupérer une liste paginée des véhicules, avec des options de pagination.
- **Méthode** : GET
- **Paramètres** : page - Numéro de la page à récupérer (par défaut 1).
- **Réponse** : Un tableau JSON contenant les informations des véhicules, la page actuelle, le nombre d'éléments par page et le nombre total d'éléments.
- **Exemple d'utilisation** : GET /api/vehiculesby?page=2


### GET /api/vehicules/{id} - Détails d'un véhicule spécifique :

Cette route permet de récupérer les détails d'un véhicule spécifique en utilisant son identifiant.
- **Méthode** : GET
- **Paramètres** : id - Identifiant du véhicule.
- **Réponse** : Un objet JSON contenant les détails du véhicule demandé.
- **Exemple d'utilisation** : GET /api/vehicules/2

Chaque route utilise le format JSON pour la réponse, et les données sont sérialisées en utilisant le groupe de sérialisation "getVehicules". Les informations paginées sont également incluses dans la réponse pour la route qui prend en charge la pagination (GET /api/vehiculesby). Ces routes offrent une API simple mais puissante pour récupérer des informations sur les véhicules du projet.

## Diagrammes

[Diagramme de classes](/resources/Class_diagram.jpg)

[Diagramme de cas d'utilisations](/resources/Diagramme%20de%20cas%20d'utilisation.jpg)

[Diagramme de séqence 1](/resources/Diagramme_de_sequence.jpg)

[Diagramme de séqence 2](/resources/Diagramme%20de%20sequence_2.jpg)

## Gestion du projet

[Lien Trello](https://trello.com/invite/b/dgUV8RYD/ATTI189616a6e0ff510e6d90fbe8b697cea2EA540D2E/ecf-vincent-parrot)
