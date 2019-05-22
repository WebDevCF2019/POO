<?php
// connexion
require_once "config.php";
require_once "connect3.php";

// récupérations de tous les éléments de la table pdo1 classé par la date DESC, on utilise la méthode query pour les SELECT uniquement (cR{read}ud)

$recup = $connexion->query("SELECT * FROM pdo1 ORDER BY ladate DESC;");

// on récupère tous les résultats, et on les met dans un tableau indexé contenant des tableaux associatifs
$resultat = $recup->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion de la table pdo1</title>
</head>
<body>
<h1>Gestion de la table pdo1 - Affichage</h1>
<nav>
    <a href="./">Accueil</a> |
    <a href="ajout.php">Ajouter</a> |
    <a href="modifier.php">Modifie toutes les dates</a> |
</nav>
<div>
    <?php

    foreach ($resultat as $item){
        echo "<h3>".$item['nom']."</h3>";
        echo "<p>".$item['texte']."</p>";
        echo "<p>".$item['ladate']."</p>";
        echo "<a href='detail.php?id={$item['id']}'>afficher le détail</a>";

    }

    ?>
</div>
</body>
</html>