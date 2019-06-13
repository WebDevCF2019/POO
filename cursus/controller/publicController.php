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

    $idsection = (int) $_GET['idthesection'];

    // on sélectionne les détails de la section
    $detailsection = $thesectionM->selectionnerSectionParId($idsection);

    // on sélectionne les étudiants de la section actuelle
    $recupStudent = $thestudentM->selectionnerStudentBySectionId($idsection);

    echo $twig->render("sectionPublic.html.twig",["lemenu" => $menu,"detailsection"=>$detailsection,"student"=>$recupStudent]);


/*
 * Page de connexion
 */

}elseif(isset($_GET['connect'])) {

    // on a pas envoyé le formulaire
    if(empty($_POST)){

        // on appel le formulaire
        echo $twig->render("connectPublic.html.twig",["lemenu" => $menu]);

    }else{
        // instanciation de l'objet theuser avec hydratation des variables de notre formulaire
        $user = new theuser($_POST);
        /*
         *
         *
         *
         */
        var_dump($user);
    }




/*
 * Page d'accueil publique
 */
}else {


// on sélectionne toutes les sections avec leur description pour les afficher sur la page d'accueil
    $section = $thesectionM->selectionnerSectionIndexPublic();

// on appelle la vue générée par twig

    echo $twig->render('accueilPublic.html.twig', ["lemenu" => $menu, "sections" => $section]);

}