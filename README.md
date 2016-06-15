# YourBestGame

[![Build Status](https://travis-ci.org/OscarDuranX/YourBestGame.svg?branch=master)](https://travis-ci.org/OscarDuranX/YourBestGame)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/OscarDuranX/YourBestGame/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/OscarDuranX/YourBestGame/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/OscarDuranX/YourBestGame/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/OscarDuranX/YourBestGame/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/OscarDuranX/YourBestGame/badges/build.png?b=master)](https://scrutinizer-ci.com/g/OscarDuranX/YourBestGame/build-status/master)

## Official Documentation

Web per a compartir jocs creats per altres persones, els usuaris podran probar qualsevol joc, estan registrats o no, també podran donar la seva opinió independent ment de si estan registrats o no.
El usuaris registrats podran valorar el joc per a poder realitzar un ranquin.
Podras filtrar el joc amb categories.

## Instal·lació

- Clonem el projecte i accedim a ell:

git clone https://github.com/OscarDuranX/YourBestGame.git
cd YourBestGame

- Clonarem el fitxer '.env.example' per a poder utiltizarlo(important), es te que editar el .env amb les dades de la DB que usaras(DB_HOST - DB_DATABASE - DB_USERNAME - DB_PASSWORD):

mv .env.example .env


- A continuació instl·larem els moduls del composer amb la següent comanda:

composer install

- Després tindrem que crear la base de dades al teu Mysql, una volta cret ejecutarem la comanda següent per a crear les taules:

php artisan migration

- Si a la hora de ejecutar ens surt aquest error:

No supported encrypter found. The cipher and / or key length are invalid.

- Tindrem que ejecutar la següent comanda:

php artisan key:generate

## Tags

- v 1.0


