<p align="center">
<a href="#">
		<img width="300" src="public/images/logo.png" alt="Garage Vincent Parrot">
</a>
<br><br>
</p>

[![fr](https://img.shields.io/badge/lang-fr-blue.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.md)
[![en](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.en.md)
[![ro](https://img.shields.io/badge/lang-ro-yellow.svg)](https://github.com/Techni-Dan/VParrotWebApp/blob/main/README.ro.md)

# Service auto aplicație web Vincent PARROT

<a href="https://github.com/Techni-Dan/VParrotWebApp/blob/main/LICENSE">
<img src ="https://img.shields.io/github/license/Techni-Dan/VParrotWebApp" />
</a>
<a href="https://github.com/Techni-Dan/VParrotWebApp/issues">
<img src ="https://img.shields.io/github/issues/Techni-Dan/VParrotWebApp" />
</a><br><br>

Link către versiunea online a proiectului: [Click aici](https://vparrotwebapp.technidan.com)

Proiectul Service automobile Vincent Parrot este o aplicație web creată pentru o evaluare în timpul cursurilor.

## Caracteristici

Antreprenorul Vincent Parrot are un cont de administrator care îi permite să gestioneze conturile de utilizator pentru angajați (creare, modificare, vizualizare, ștergere), să gestioneze modificările la secțiunea de servicii de reparații din pagina de start (creare, modificare, vizualizare, ștergere), să gestioneze modificările la nivelul programului de deschidere/închidere a service-ului prezent în fiecare pagină a site-ului din footer-ul paginii.

Site-ul web afișează în mod clar și concis diferitele servicii de reparații auto oferite de service pe pagina de pornire.

Site-ul prezintă vehiculele second hand disponibile spre vanzare, cu fotografii, descrieri detaliate si informații tehnice.

Un sistem de filtre facilitează căutarea vehiculelor prin ajustarea rezultatelor în funcție de un interval de preț, numărul de kilometri parcurși sau anul de înmatriculare.

Doar angajații au posibilitatea de a: adăuga, modifica, vizualiza și șterge mașinile second hand oferite spre vânzare pe site.

Angajații au posibilitatea să: adauge, editeze, vizualizeze, ștergă părerile precum și să modereze părerile vizitatorilor pentru a evita conținutul inadecvat sau ofensator înainte de a posta aceste păreri pe pagina de start.

Conectarea la spațiul dedicat administrației se face prin intermediul unei adrese de e-mail și a unei parole din același formular de conectare pentru ambele tipuri de utilizatori.

Vizitatorii site-ului au posibilitatea de a contacta service-ul în orice moment, telefonic sau completând un formular de contact online.

Informațiile de contact, inclusiv formularul, sunt, de asemenea, vizibile în partea de jos a fiecărui anunț de vehicul second hand, cu subiectul formularului ajustat automat în funcție de titlul anunțului de vehicul.

## Configurarea mediului de lucru

- dispozitiv: [Apple Mac Mini - Apple M2 Pro](https://www.apple.com/newsroom/2023/01/apple-introduces-new-mac-mini-with-m2-and-m2-pro-more-powerful-capable-and-versatile-than-ever/)

- sistem de operare: [macOS Sonoma 14.3](https://developer.apple.com/documentation/macos-release-notes/macos-14_3-release-notes)

- IDE: [Visual Studio Code 1.85.2](https://code.visualstudio.com/)

- IDE: [PhpStorm 2023.3.2](https://www.jetbrains.com/phpstorm/download)

- sistem de control al versiunilor: [Git versiunea 2.43.0](https://git-scm.com/)

- server web local: [XAMPP 8.2.4-0](https://www.apachefriends.org/download.html)

- limbaj de scripting de uz general: [PHP 8.3.2](https://www.php.net/downloads)

- gestionarea dependențelor în PHP: [Composer versiunea 2.6.5](https://getcomposer.org/download/)

- instrument de dezvoltare pentru a construi, rula și gestiona aplicațiile Symfony: [Symfony CLI versiunea 5.8.4](https://symfony.com/download)

- mediu de execuție JavaScript: [Node.js 20.11.0](https://nodejs.org/en/download)

- gestionar de pachete "npm" JavaScript Node.js: [npm 10.4.0](https://docs.npmjs.com/try-the-latest-stable-version-of-npm)

- npx executare pachete: [npx 10.4.0](https://www.npmjs.com/package/npx)

- manager de pachete: [yarn 1.22.19](https://classic.yarnpkg.com/lang/en/docs/install/)

- browser web: [Google Chrome 121.0.6167.85](https://www.google.com/intl/ro/chrome/)

## Instalare

Puteți clona acest depozit pentru a crea o copie locală pe computerul dvs.:

```bash
git clone git@github.com:Techni-Dan/VParrotWebApp.git
```

Pentru a utiliza o bază de date MySQL, ar trebui să activați driverul în php.ini pe dispozitivul dvs. dacă nu este deja activat.
Anulați comentariul „extension=php_pdo_mysql.dll” din fișierul php.ini.

După configurarea mediului de lucru puteți trece la instalarea componentelor necesare. Trebuie să deschideți proiectul clonat în IDE. În terminalul IDE-ului tău trebuie să mergi în folderul noului proiect creat după clonare dacă nu este deja cazul:

```bash
cd VParrotWebApp
```

Cu această comandă, în terminal instalezi dependențele proiectului prezent în [composer.json](composer.json):

```bash
composer install
```

Dacă Composer nu este instalat în mediul dvs. de lucru, veți găsi la această adresă informații care vă permit să îl instalați:

- [https://getcomposer.org/download/](https://getcomposer.org/download/)

Cu această comandă, în terminal instalezi dependențele proiectului prezente în [yarn.lock](yarn.lock):

```bash
yarn
```

Dacă yarn nu este instalat în mediul dvs. de lucru, veți găsi informații la această adresă care vă permit să îl instalați:

- [https://classic.yarnpkg.com/lang/en/docs/install/](https://classic.yarnpkg.com/lang/en/docs/install/)

Dacă node.js nu este instalat în mediul dvs. de lucru, veți găsi informații la această adresă care vă permit să îl instalați:

- [https://nodejs.org/en/download](https://nodejs.org/en/download)

În fișierul [.env](.env) trebuie să definim informațiile privind accesul la baza de date.  DBHOST="127.0.0.1" -> adresa IP locală, DBPORT="3306" -> numărul portului, DBNAME="VParrotWebAppDB" -> numele bazei de date, DATABASE_PASSWORD="" -> fără o parolă în local, MYSQL_DB_USER="root" -> pentru utilizator.

```bash
DBHOST="127.0.0.1"
DBPORT="3306"
DBNAME="VParrotWebAppDB"
DATABASE_PASSWORD=""
MYSQL_DB_USER="root"
```

Trebuie să porniți serverele Apache Web Server și MySQL Database în aplicația XAMPP din secțiunea Manage Servers

Cu această comandă, în terminalul IDE-ului tău, creezi baza de date VParrotWebAppDB

```bash
symfony console doctrine:database:create
```

Cu această comandă, în terminal creați migrarea entităților:

```bash
symfony console make:migration
```

Cu această comandă, în terminal, efectuați migrarea către baza de date:

```bash
symfony console doctrine:migration:migrate
```

Cu această comandă, în terminalul IDE-ului tău, instalezi certificate pentru a putea naviga în https:

```bash
symfony server:ca:install
```

Puteți deschide phpMyAdmin în browser pentru a vizualiza noua bază de date.
[http://127.0.0.1/phpmyadmin/index.php?route=/](http://127.0.0.1/phpmyadmin/index.php?route=/)

Este necesar sa se insereze in baza de date la nivelul tabelului employes un angajat cu roles = ["ROLE_ADMIN"] si o parolă hashată pentru Vincent Parrot.

Cu această comandă, în terminalul IDE-ului tău, poți hasha o parolă:

```bash
symfony console security:hash-password
```

Symfony vă returnează parola hashată, trebuie să o copiați.

În phpMyAdmin în baza de date dbparrot, în tabelul employes din ongletul sql, trebuie să inserați angajat înlocuind \_parolă_hashată\_ cu parola pe care ați copiat-o, puteți înlocui admin@gmail.com cu o adresă de e-mail la alegere, aceasta va servi ca ID de conectare pentru administratorul Parrot Vincent.

```bash
INSERT INTO `employes` (`id`, `nom`, `prenom`, `email`, `roles`, `password`) VALUES
(1, 'Parrot', 'Vincent', 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '_parolă_hashată_');
```

Atributul $roles al entității [Employes](/src/Entity/Employes.php) este inițializat cu valoarea ["ROLE_EMPLOYE"], astfel încât de fiecare dată când este creat un angajat, rolul este predefinit și nu poate fi modificat în sectiunea de creare a unui nou angajat de către administrator. Modificarea poate fi făcută numai în baza de date prin phpMyAdmin.

În momentul conectării în funcție de rol, utilizatorul este redirecționat către spațiul de administrare care îl privește.

În ceea ce privește trimiterea datelor din formularele de contact, aplicația folosește trimiterea de e-mailuri. Aceste date nu sunt salvate în baza de date.

Pentru a face acest lucru, trebuie să aveți o adresă Gmail, cu [Verificarea în doi pași activată](https://myaccount.google.com/signinoptions/two-step-verification) în cont și să adăugați o [ cheie de securitate pentru aplicație ](https://myaccount.google.com/two-step-verification/security-keys).

Apoi, în fișierul [.env](.env) de la MAILER_DSN=gmail://USERNAME:PASSWORD@default, trebuie să înlocuiți USERNAME cu numele de utilizator Gmail și PAROLA cu cheia de securitate pe care ați creat-o.

În fișierele [ContactController.php](/src/Controller/ContactController.php) linia numărul 37 și [OccasionsController.php](/src/Controller/OccasionsController.php) linia 110 trebuie să înlocuiți test@gmail.com cu adresa dvs. de e-mail.

Cu această comandă, în terminalul IDE-ului dvs., porniți serverul de dezvoltare:

```bash
npx encore dev-server --hot
```

Cu această comandă, într-un nou terminal al IDE-ului dvs., lansați serverul intern Symfony în fundal:

```bash
symfony serve -d
```

Serverul Symfony vă informează că ascultă la adresa https://127.0.0.1:8000
Puteți deschide acest link în browser.

Aveți acum posibilitatea să vă conectați la spațiul de administrare cu contul creat pentru Vincent PARROT și să adăugați identificatori pentru angajați, programul de deschidere/închidere a service-ului, serviciile de reparații auto oferite de garaj.

Conectându-vă cu un ID de angajat, veți putea adăuga mașini second hand spre vânzare, adăugați, moderați și aprobați păreri.

Cu această comandă, în terminalul IDE-ului dvs., opriți serverul intern Symfony:

```bash
symfony server:stop
```

Pentru a opri serverul de dezvoltare, utilizați comanda Control+C pentru MacOS sau CTRL+C pentru Windows.

**Notă:**

> Aceasta este o aplicație web în modul de dezvoltare și nu o aplicație web în modul producție.