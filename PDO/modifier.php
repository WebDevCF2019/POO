<?php
// connexion
require_once "config.php";
require_once "connect3.php";

$datetime = date("Y-m-d H:i:s");

$updateall = $connexion->exec("UPDATE pdo1 SET ladate='$datetime'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion de la table pdo1</title>
</head>
<body>
<h1>Gestion de la table pdo1 - Modification des dates de tous les articles</h1>
<nav>
    <a href="./">Accueil</a> |
    <a href="ajout.php">Ajouter</a> |
    <a href="afficher.php">Afficher tous les entrées</a> |

</nav>
<div>
    <h3>Nous avons modifier <?=$updateall?> articles</h3>
</div>
</body>
</html>