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

    // on va chercher les sections et leurs étudiants (si il y en a)
    $recup = $thesectionM->selectionnerSectionIndexAdmin();
    echo $twig->render('accueilAdmin.html.twig', ["section"=>$recup]);

}