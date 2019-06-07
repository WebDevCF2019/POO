<?php
/*
 * Public
 */

// on crée notre menu
$menu = $thesectionM->creerMenu();

// on appelle la vue générée par twig

echo $twig->render('index.html.twig',["lemenu"=>$menu]);