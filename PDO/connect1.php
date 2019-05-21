<?php

require_once "config.php";

// Pour se connecter à une base de donnée grâce à PDO, on doit instancier l'objet PDO et passer les paramètres de connexion

$connexion = new PDO(
    'mysql:host='.DB_HOST.';dbname='.DB_NAME.';port='.DB_PORT.';charset='.DB_CHARSET,
    DB_LOGIN,
    DB_PWD);
