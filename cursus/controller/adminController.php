<?php
/*
 *
 * ADMIN
 *
 */


if (isset($_GET['disconnect'])) {

    /*
     *
     * On se déconnecte (la redirection est inclue dans le modèle)
     *
     */

    $theuserM->deconnecterSession();

} else {

    /*
     *
     * Accueil de l'admin
     *
     */

// on appelle la vue générée par twig

    echo $twig->render('accueilAdmin.html.twig', []);

}