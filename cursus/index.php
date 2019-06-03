<?php
/*
 *
 *
 * Front Controller
 *
 *
 */

/*
 * Load Dependencies
 */

require_once "config.php";

require_once "model/MyPDO.php";

// connexion to our DB
try {
    $connexion = new MyPDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT . ';charset=' . DB_CHARSET,
        DB_LOGIN,
        DB_PWD,
        null,
        PRODUCT);
}catch (PDOException $e){
    echo $e->getMessage();
    die();
}