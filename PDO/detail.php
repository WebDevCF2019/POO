<?php
// connexion
require_once "config.php";
require_once "connect3.php";

// récupérations d'un élément

// si pas d'id valide
if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])){
    header("Location: ./");
    exit();
}

$id = (int) $_GET['id'];


$recup = $connexion->query("SELECT * FROM pdo1 WHERE id=$id;");

// on récupère un ou zéro résultat

// si on a un résultat (rowCount() renvoie le nombre de lignes récupérées 1=> true 0 => false
if($recup->rowCount()) {
    $resultat = $recup->fetch(PDO::FETCH_ASSOC);
}else{
    $erreur ="404 Cet article n'existe plus";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion de la table pdo1</title>
</head>
<body>
<h1>Gestion de la table pdo1 - Affichage détail d'un article</h1>
<nav>
    <a href="./">Accueil</a> |
    <a href="ajout.php">Ajouter</a> |
    <a href="afficher.php">Afficher tous les entrées</a> |
    <a href="modifier.php">Modifie toutes les dates</a> |

</nav>
<div>
    <?php
    // on a rien récupéré
    if(isset($erreur)){
        echo "<h3>$erreur</h3>";
    }else{
        echo "<h3>".$resultat['nom']."</h3>";
        echo "<p>".$resultat['texte']."</p>";
        echo "<p>".$resultat['ladate']."</p>";
    }
    ?>
</div>
</body>
</html>