<?php
require_once "connectPDO.php";

// SELECT PDO sans requête préparé

$recupDatas = $connexion->query("SELECT * FROM pdo1;");

echo "<h3>{$recupDatas->rowCount()} résultats récupérés</h3>";


// en cas de résultats multiples, on peut ne pas utiliser le fetchAll si on fait une boucle while sur un fetch (ligne par ligne)
while($item = $recupDatas->fetch(PDO::FETCH_OBJ)){
    echo "$item->nom | ";
}

// on vide les résultats se trouvant dans $recupDatas avec closeCursor (si on le fait avant le while, on perd nos résultats)
$recupDatas->closeCursor();


echo "<hr>";

// SELECT PDO AVEC une requête préparée (pour l'exemple, il est inutile de préparer des requêtes si il n'y a pas d'entrées utilisateurs)

$recupDatas = $connexion->prepare("SELECT * FROM pdo1;");

// après une préparation, on doit exécuter la requête
$recupDatas->execute();

$datas = $recupDatas->fetchAll(PDO::FETCH_OBJ);

// on vide les résultats se trouvant dans $recupDatas avec closeCursor (on garde les résultats car ils se trouvent dans le tableau $datas)
$recupDatas->closeCursor();

// le fetchAll renvoie un tableau (contenant des objets), on utilise donc foreach pour le lister
foreach($datas AS $item){
    echo "$item->nom | ";
}


