<?php
/*
 * Public
 */

// on crée notre menu
$menu = $thesectionM->creerMenu();

// on sélectionne toutes les sections avec leur description pour les afficher sur la page d'accueil
$section = $thesectionM->selectionnerSectionIndexPublic();

// on appelle la vue générée par twig

echo $twig->render('accueilPublic.html.twig',["lemenu"=>$menu,"sections"=>$section]);