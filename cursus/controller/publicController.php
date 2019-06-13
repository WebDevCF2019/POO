<?php
/*
 * Public
 */


// on crée notre menu pour toutes les pages publiques
$menu = $thesectionM->creerMenu();

/*
 * Page d'une section
 */

if(isset($_GET['idthesection'])&&ctype_digit($_GET['idthesection'])){





}else {


/*
 * Page d'accueil publique
 */



// on sélectionne toutes les sections avec leur description pour les afficher sur la page d'accueil
    $section = $thesectionM->selectionnerSectionIndexPublic();

// on appelle la vue générée par twig

    echo $twig->render('accueilPublic.html.twig', ["lemenu" => $menu, "sections" => $section]);

}