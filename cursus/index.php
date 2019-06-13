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

// composer vendor loading (for twig)
require_once 'vendor/autoload.php';



// Initialize twig templating system
$loader = new \Twig\Loader\FilesystemLoader('view/');
$twig = new \Twig\Environment($loader);





/*
 * create class autoload - find class into model's folder
 */

spl_autoload_register(function ($class) {
    require_once 'model/' . $class . '.php';
});


// connexion to our DB
try {
    $connexion = new MyPDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT . ';charset=' . DB_CHARSET,
        DB_LOGIN,
        DB_PWD,
        null,
        PRODUCT);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}


// create common's Managers

$thesectionM = new thesectionManager($connexion);
$thestudentM = new thestudentManager($connexion);

/*
 * public
 */

require_once "controller/publicController.php";