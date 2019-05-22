<?php
require_once "connectPDO.php";

// SELECT PDO sans requête préparé

// variables venant d'un utilisateur
$de = "5";
$a = "10";

// traîtement des variables

$de = (int)$de;
$a = (int)$a;

$recupDatas = $connexion->query("SELECT * FROM pdo1 WHERE id BETWEEN $de AND $a;");

echo "<h3>{$recupDatas->rowCount()} résultats récupérés</h3>";


while($item = $recupDatas->fetch(PDO::FETCH_OBJ)){
echo "$item->id => $item->nom <br>";
}

$recupDatas->closeCursor();


echo "<hr>";

/*
 * SELECT PDO avec requête préparée, marqueurs non nominatifs et bindValue
 *
 * ! A utiliser en cas d'entrées utilisateurs !
 *
 */

// variables venant d'un utilisateur
$de = "5";
$a = "10";

// création de la requête avec des marqueurs non nominatifs
$sql = "SELECT * FROM pdo1 WHERE id BETWEEN ? AND ?;";

// préparation de la requête
$recupDatas = $connexion->prepare($sql);

// Avec bindValue, on va remplacer les "?" de notre requête par des valeurs traitées ! L'ordre est de gauche à droite pour les ? (1,2,...)
$recupDatas->bindValue(1,$de,PDO::PARAM_INT);
$recupDatas->bindValue(2,$a,PDO::PARAM_INT);

// execution
$recupDatas->execute();

echo "<h3>{$recupDatas->rowCount()} résultats récupérés</h3>";


while($item = $recupDatas->fetch(PDO::FETCH_OBJ)){
    echo "$item->id => $item->nom <br>";
}

$recupDatas->closeCursor();

echo "<hr>";
// execution de $recupDatas, la requête est mémorisée
$recupDatas->execute();

echo "<h3>{$recupDatas->rowCount()} résultats récupérés</h3>";


while($item = $recupDatas->fetch(PDO::FETCH_OBJ)){
    echo "$item->id => $item->nom <br>";
}

$recupDatas->closeCursor();

echo "<hr>";

// changement des paramètres
$recupDatas->bindValue(1,3,PDO::PARAM_INT);
$recupDatas->bindValue(2,7,PDO::PARAM_INT);

// execution de $recupDatas, la requête est mémorisée
$recupDatas->execute();

echo "<h3>{$recupDatas->rowCount()} résultats récupérés</h3>";


while($item = $recupDatas->fetch(PDO::FETCH_OBJ)){
    echo "$item->id => $item->nom <br>";
}

$recupDatas->closeCursor();

echo "<hr>";


// execution de $recupDatas, la requête est mémorisée
$recupDatas->execute([2,5]);

echo "<h3>{$recupDatas->rowCount()} résultats récupérés</h3>";


while($item = $recupDatas->fetch(PDO::FETCH_OBJ)){
    echo "$item->id => $item->nom <br>";
}

$recupDatas->closeCursor();