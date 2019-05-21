<?php

require_once "config.php";


// on essaie de se connecter try{}
try {
    $connexion = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT . ';charset=' . DB_CHARSET,
        DB_LOGIN,
        DB_PWD);

    // affichage des erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// si le try échoue on capture l'erreur de type PDOException => gestionnaire d'erreur
}catch(PDOException $e){
    echo "Erreur:".$e->getMessage();
    echo "<br>Erreur numéro: ".$e->getCode();
    die();
}
