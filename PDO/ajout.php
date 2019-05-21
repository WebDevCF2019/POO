<?php
// connexion
require_once "config.php";
require_once "connect3.php";

// si on a cliqué sur envoyé
if(isset($_POST['nom'],$_POST['texte'])){

    // on protège nos variables
    $nom = htmlspecialchars(strip_tags(trim($_POST['nom'])),ENT_QUOTES);
    $texte = htmlspecialchars(strip_tags(trim($_POST['texte'])),ENT_QUOTES);

    // on utilise notre instance de PDO avec sa méthode exec(), qui est utilisée pour les CUD (create update delete)
    $nb = $connexion->exec("INSERT INTO pdo1 (nom,texte) VALUES ('$nom','$texte') ;");

    // le $nb est rempli par exec() avec le nombre de lignes touchées par la commande sql
    $affiche = "Nombre d'insertion: $nb";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout dans la table pdo1</title>
</head>
<body>
<h1>Gestion de la table pdo1 - Ajout</h1>
<nav>
    <a href="./">Accueil</a> |
    <a href="afficher.php">Afficher tous les entrées</a> |
</nav>
<h3>Ajouter une entrée avec exec</h3>

<?php if(isset($affiche)) echo "<h3>$affiche</h3>";?>

<form action="" method="post" name="ajout">

    <input type="text" name="nom" placeholder="Votre nom" required><br>
    <textarea name="texte" placeholder="Votre texte" required></textarea><br>
    <input type="submit" value="Envoyer">
</form>

</body>
</html>