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

- IDE: [Visual Studio Code 1.86.0](https://code.visualstudio.com/)

- IDE: [PhpStorm 2023.3.2](https://www.jetbrains.com/phpstorm/download)

- sistem de control al versiunilor: [Git versiunea 2.43.0](https://git-scm.com/)

- server web local: [XAMPP 8.2.4-0](https://www.apachefriends.org/download.html)

- limbaj de scripting de uz general: [PHP 8.3.2](https://www.php.net/downloads)

- gestionarea dependențelor în PHP: [Composer versiunea 2.6.5](https://getcomposer.org/download/)

- instrument de dezvoltare pentru a construi, rula și gestiona aplicațiile Symfony: [Symfony CLI versiunea 5.8.6](https://symfony.com/download)

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

În fișierul [.env](.env) trebuie să definim informațiile privind accesul la baza de date.  DBHOST="127.0.0.1" -> adresa IP locală, DBPORT="3306" -> numărul portului, DBNAME="VParrotWebApp" -> numele bazei de date, DATABASE_PASSWORD="" -> fără o parolă în local, MYSQL_DB_USER="root" -> pentru utilizator.

```bash
DBHOST="127.0.0.1"
DBPORT="3306"
DBNAME="VParrotWebApp"
#DATABASE_PASSWORD=""
MYSQL_DB_USER="root"
```

Trebuie să porniți serverele Apache Web Server și MySQL Database în aplicația XAMPP din secțiunea Manage Servers

Cu această comandă, în terminalul IDE-ului tău, creezi baza de date VParrotWebApp

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
(1, 'Parrot', 'Vincent', 'admin@email.com', '[\"ROLE_ADMIN\"]', '_parolă_hashată_');
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

## Fixtures

Fixture-urile în cadrul acestui proiect Symfony reprezintă date de test predefinite utilizate pentru popularea bazei de date cu informații fictive, simulând astfel funcționarea aplicației într-un mediu de dezvoltare. Acestea sunt deosebit de utile pentru evaluarea bunei funcționări a aplicației, testarea diferitelor funcționalități și asigurarea consistenței datelor. Fișierele de fixture se găsesc în directorul /src/DataFixtures/.

Fișierul [VehiculeFixtures.php](/src/DataFixtures/VehiculeFixtures.php) este responsabil de crearea a 800 de înregistrări de vehicule, fiecare generată cu date aleatorii folosind biblioteca Faker. Aceste date includ detalii precum preț, anul înregistrării, kilometraj, descriere, opțiuni și altele. Vehiculele sunt asociate aleatoriu cu mărci, modele, categorii, carburanți, tipuri și angajați, oferind astfel o varietate de date realiste.

Fișierul [MarqueFixtures.php](/src/DataFixtures/MarqueFixtures.php) creează instanțe ale clasei Marque cu nume de mărci predefinite, salvând fiecare instanță în baza de date. De asemenea, înregistrează o referință pentru fiecare marcă, permițând recuperarea acestora în alte fixture-uri.

Fișierul [ModeleFixtures.php](/src/DataFixtures/ModeleFixtures.php) este responsabil de crearea de instanțe ale clasei Modele, asociate cu mărci specifice. Folosește referințele create de MarqueFixtures.php pentru a stabili relațiile dintre mărci și modele.

Fișierul [CategorieFixtures.php](/src/DataFixtures/CategorieFixtures.php) creează instanțe ale clasei Categorie, care reprezintă categoriile de vehicule, cum ar fi Mașină, Motocicletă, Camion și Utilitar. Fiecare categorie este persistată în baza de date cu o referință unică, facilitând astfel utilizarea acestor categorii în alte fixture-uri.

Fișierul [CarburantFixtures.php](/src/DataFixtures/CarburantFixtures.php) creează instanțe ale clasei Carburant, reprezentând diferite tipuri de combustibili precum Motorină, Benzină, Hibrid etc. Aceste instanțe sunt, de asemenea, salvate în baza de date.

Fișierul [TypeFixtures.php](/src/DataFixtures/TypeFixtures.php) Generează date pentru clasa Type, care reprezintă tipurile de vehicule precum 4x4, Sedan, Break etc. Tipurile sunt adăugate în baza de date cu referințe unice pentru un acces ușor în alte fixture-uri.

Fișierul [ServiceFixtures.php](/src/DataFixtures/ServiceFixtures.php) creează intrări de servicii pentru garaj, detaliind diferite tipuri de reparații și întrețineri oferite. Fiecare serviciu este însoțit de o descriere detaliată, o listă de elemente specifice și o imagine ilustrativă. Aceste servicii reflectă competențele și expertiza garajului în repararea caroseriei, mecanică, precum și în întreținerea regulată a vehiculelor.

Fișierul [EmployesFixtures.php](/src/DataFixtures/EmployesFixtures.php) generează 10 conturi de angajați, fiecare asociat cu un nume, prenume, adresă de e-mail, parolă și atribuit rolului 'ROLE_EMPLOYE'. Aceste conturi fictive simulând prezența angajaților în aplicație și testând funcționalitățile legate de gestionarea personalului.

Fișierul [HoraireFixtures.php](/src/DataFixtures/HoraireFixtures.php) creează orare fictive de deschidere pentru garaj, detaliind orele de deschidere și închidere pentru fiecare zi a săptămânii. Aceste orare oferă o reprezentare simulată a perioadelor în care garajul este deschis publicului, permitând astfel testarea funcționalităților legate de planificarea vizitelor.

Fișierul [TemoignageFixtures.php](/src/DataFixtures/TemoignageFixtures.php) este o clasă de fixture-uri utilizată pentru a popula baza de date cu date de marturii fictive atunci când este încărcată. Acest fișier de fixture-uri generează în mod aleatoriu mărturii cu nume, comentarii și note fictive, persistându-le în baza de date. Acest lucru poate fi util pentru a avea date realiste despre mărturii în timpul dezvoltării sau testelor.

Fiecare dintre aceste fișiere este folosit pentru a crea seturi specifice de date în baza de date, iar acestea sunt interconectate prin referințele create. 

Pentru a încărca aceste date în baza de date, dacă încă nu ați făcut asta, trebuie să creați baza de date cu comanda:

```bash
php bin/console doctrine:database:create
```
creați migrarea cu comanda:

```bash
consola symfony make:migration
```

migrați în baza de date cu comanda:

```bash
consola symfony doctrine:migration:migrate
```

încărcați fixturile în baza de date cu comanda:

```bash
php bin/console doctrine:fixtures:load
```

Acest lucru creează un set coerent de date pentru dezvoltare și testare.

În ansamblu, aceste fixture-uri contribuie la eficientizarea dezvoltării aplicației, furnizând date consistente și diversificate pentru diferitele entități ale aplicației, facilitând astfel testarea și validarea funcționalităților.

Puteți lansa aplicația. Printre alte date, utilizatori au fost introduși în baza de date:
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, parolă: test
2. Employe1 Prenom1, ROLE_EMPLOYE, e-mail: user1@email.com, parolă: test.

**Notă:**

> Link către versiunea online a proiectului cu 1 000 de vehicule înregistrate în baza de date cu ajutorul fixture-urilor: Faceți [clic aici](https://vparrotwebapptest.technidan.com).

> Dacă primiți o eroare la încărcarea fixturilor, este probabil din cauza referințe cheilor. Pentru a rezolva această problemă, trebuie să ștergeți baza de date și migrarea, apoi să recreați baza de date, să creați migrarea, să efectuați migrarea și apoi să încărcați fixturile. 

## Introduceți prin SQL în baza de date

### Exemplul 1:

Pentru a testa aplicația, dacă doriți, puteți completa baza de date cu datele eșantion prezentate în fișierul [VParrotWebApp.sql](/resources/VParrotWebApp.sql).
Acest fișier a fost generat de PhpMyAdmin după ce baza de date a fost populată prin interfața de administrare a aplicației.

Pentru a face acest lucru, trebuie să porniți serverele Apache Web Server și MySQL Database în aplicația XAMPP din secțiunea Manage Servers dacă acest lucru nu este deja făcut și apoi într-un browser de internet deschideți [http://127.0.0.1/phpmyadmin/index.php](http://127.0.0.1/phpmyadmin/index.php) și selectați baza de date VParrotWebApp și apoi selectați fila Import, faceți clic pe butonul Alegeți fișier și selectați fișierul VParrotWebApp.sql din dosarul proiectului /VParrotWebApp/resources/ și apoi faceți clic pe butonul Import.

Odată ce importul este finalizat, puteți lansa aplicația. Printre alte date, doi utilizatori au fost introduși în baza de date:
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, parolă: test
2. DOE John, ROLE_EMPLOYE, e-mail: user1@email.com, parolă: test.

### Exemplul 2:

Fișierul [schema.sql](/resources/schema.sql) a fost scris de mână și vă permite să creați baza de date VParrotWebAppOne și să inserați date în această bază de date prin PhpMyAdmin.

Pentru a face acest lucru, trebuie să porniți serverele Apache Web Server și MySQL Database în aplicația XAMPP din secțiunea Manage Servers dacă acest lucru nu este deja făcut și apoi într-un browser de internet deschideți [http://127.0.0.1/phpmyadmin/index.php](http://127.0.0.1/phpmyadmin/index.php) și selectați fila Import, faceți clic pe butonul Alegeți fișier și selectați fișierul schema.sql din dosarul proiectului /VParrotWebApp/resources/ și apoi faceți clic pe butonul Import.

Odată ce importul este finalizat, puteți lansa aplicația. Printre alte date, doi utilizatori au fost introduși în baza de date:
1. PARROT Vincent, ROLE_ADMIN, email: admin@email.com, parolă: test
2. DOE John, ROLE_EMPLOYE, e-mail: user1@email.com, parolă: test.

Pentru a putea lansa aplicația, trebuie mai întâi să modificați numele bazei de date în fișierul [.env](/.env) de la linia 33, DBNAME="VParrotWebAppOne".

## API

O API, sau Interfață de Programare a Aplicațiilor, este un set de reguli și protocoale care permit comunicarea între două aplicații software distincte. Aceasta definește metodele și formatele de date pe care aplicațiile le pot utiliza pentru a solicita și a schimba informații. O API acționează ca un punte, permițând diferitelor aplicații să lucreze împreună în mod coeziv.

Controlerul [VehiculesController.php](/src/Controller/Api/VehiculesController.php) expune trei rute pentru interacțiunea cu datele vehiculelor.

### GET /api/vehicules - Listă cu toate vehiculele:
Această rută returnează lista completă a tuturor vehiculelor disponibile.

- **Metodă** : GET
- **Parametri** : Niciunul
- **Răspuns** : Un șir JSON care conține informații despre vehicule.
- **Exemplu de utilizare** : GET /api/vehicules

### GET /api/vehiculesby - Listă de vehicule cu paginare:
Această rută recuperează o listă paginată a vehiculelor, cu opțiuni de paginare.

- **Metodă** : GET
- **Parametri** : page - Numărul paginii de recuperat (implicit este 1).
- **Răspuns** : Un șir JSON care conține informații despre vehicule, pagina curentă, numărul de elemente pe pagină și numărul total de elemente.
Exemplu de utilizare: GET /api/vehiculesby?page=2

### GET /api/vehicules/{id} - Detalii despre un vehicul specific:
Această rută recuperează detaliile unui vehicul specific utilizând identificatorul său.

- **Metodă** : GET
- **Parametri** : id - Identificatorul vehiculului.
- **Răspuns** : Un obiect JSON care conține detaliile vehiculului solicitat.
- **Exemplu de utilizare** : GET /api/vehicules/2

Fiecare rută folosește formatul JSON pentru răspuns, iar datele sunt serializate folosind grupul de serializare "getVehicules". Informațiile paginate sunt, de asemenea, incluse în răspuns pentru ruta care suportă paginarea (GET /api/vehiculesby). Aceste rute furnizează o API simplă, dar puternică, pentru a obține informații despre vehiculele proiectului.

## Diagrammes

[Diagrame de clase](/resources/Class_diagram.jpg)

[Diagrame caz de utilizare](/resources/Diagramme%20de%20cas%20d'utilisation.jpg)

[Diagrame de secvență 1](/resources/Diagramme_de_sequence.jpg)

[Diagrame de secvență 2](/resources/Diagramme%20de%20sequence_2.jpg)

## Managementum proiectului

[Link](https://github.com/orgs/Techni-Dan/projects/2)