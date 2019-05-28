<?php
/**
 * FC
 */

/*
 * create session () create unique id PHPSESSID, and create a cookie
 */
session_start();

/*
 * dependencies
 */
require_once "config.php";

// utilisation de la connexion PDO
require_once "connectPDO.php";

/*
 * routing
 *
 * $_GET
 *
 * détail d'article => idarticle (int)
 * détail de users => iduser (int)
 * redirection admin => connect
 */

// détail article
if(isset($_GET['idarticle']) && ctype_digit($_GET['idarticle'])) {

    // on effectue le transtypage de string vers int
    $idarticle = (int)$_GET['idarticle'];
    require_once "article.php";

// détail de user
}elseif (isset($_GET['iduser']) && ctype_digit($_GET['iduser'])) {

    $iduser = (int)$_GET['iduser'];
    require_once "user.php";

// redirection vers l'admin
}elseif (isset($_GET['connect'])){

    header("Location: admin/accueiladmin.php");

// accueil
}else{
    require_once "accueil.php";
}

//var_dump($_GET);