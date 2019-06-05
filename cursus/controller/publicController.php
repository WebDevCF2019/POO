<?php
/*
 * Public
 */

// on crée notre menu
$menu = $thesectionM->creerMenu();

// on appelle la vue générée par twig

$twig->render('index.html.twig');