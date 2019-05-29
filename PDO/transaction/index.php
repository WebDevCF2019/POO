<?php
require_once "config.php";
require_once "connectPDO.php";


/*
 * Renvoie un chaine de caractère de la longueur passée en argument
 */
function donneTexte(int $nb = 5): string {
    $sortie="";
    $chaine = "abcdef ghij vpd xz";
    $nbChaine = strlen($chaine);
     for($i=0;$i<$nb;$i++){
         $hasard = mt_rand(0,($nbChaine-1));
         $sortie .= $chaine[$hasard];
     }
    return $sortie;
}


// transaction




// SELECT ALL
$sql = "SELECT * FROM pdo1 ORDER BY id DESC";

$recupArt = $connexion->query($sql);

if($recupArt->rowCount()){
    $recupAll = $recupArt->fetchAll(PDO::FETCH_OBJ);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ici votre titre</title>
</head>
<body>

<h1>PDO1</h1>

<div>
    <?php
    foreach ($recupAll as $item){
        ?>
    <h3>ID: <?=$item->id?> | <small><?=$item->ladate?></small></h3>
    <h4><?=$item->nom?></h4>
    <p><?=$item->texte?></p>
    <?php
    }
    ?>
</div>

</body>
</html>