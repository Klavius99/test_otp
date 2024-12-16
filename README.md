<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Configuration et manipulation a faire :

<p>_ composer install </p>

<p>_ npm install </p>

<p>_ creer le fichier .env et y coller le contenu de .env.example</p>

<p>_ configurer la base donnée dans le fichier ".env" : </p>

DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
DB_PORT=3306 <br>
DB_DATABASE=nom_de_votre_base_de_donnees <br>
DB_USERNAME=votre_utilisateur <br>
DB_PASSWORD=votre_mot_de_passe <br>

<p>_ php artisan key:generate </p>

clique dans ton compte google (logo si c'est sur PC) <br>
Gerer parametres <br>
Tape : Mots de passe d'application , puis clique dessus (...) <br>
cree un nom , puis clique sur "creer" <br>
copie le code et met dans "MAIL_PASSWORD=...met_le_ici... "<br>
Le code de ne doit pas avoir d'espace <br>


Configuration pour l'envoie d'email : <br>

MAIL_MAILER=smtp <br>
MAIL_HOST=smtp.gmail.com <br>
MAIL_PORT=587 <br>
MAIL_USERNAME=email@gmail.com <br>
MAIL_PASSWORD=code_google <br>
MAIL_ENCRYPTION=tls <br>
MAIL_FROM_ADDRESS="fmouhamed238@gmail.com" <br>
MAIL_FROM_NAME="Nom de l'application" <br>
