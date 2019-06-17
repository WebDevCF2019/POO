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

}elseif (isset($_GET['addsection'])){

    /*
     *
     * On veut ajouter une section
     *
     */

    // si on a pas cliqué "envoyé" sur le formulaire
    if(empty($_POST)){


        // appel de la vue
        echo $twig->render("ajoutSectionAdmin.html.twig");

    }else{

        // on crée une instance de thesection avec le formulaire POST en paramètre
        $insert = new thesection($_POST);

        // on appel le manager et on utilise la méthode d'insertion (true en cas de réussite et false en cas d'échec)

        $forinsert = $thesectionM->createSectionAdmin($insert);

        // si l'insertion est réussie
        if($forinsert){
            header("Location: ./");
        }else{

            // appel de la vue avec affichage d'une erreur
            echo $twig->render("ajoutSectionAdmin.html.twig",["error"=>"Erreur lors de l'insertion, veuillez recommencer"]);

        }

    }



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