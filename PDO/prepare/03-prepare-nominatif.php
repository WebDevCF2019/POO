<?php
require_once "connectPDO.php";

// requête de type select sans entrées utilisateurs ->query
$tous = $connexion->query("SELECT * FROM pdo1");

// si on obtient au moins un résultat:
if($tous->rowCount()){

    // transformer les résultats en tableau indexé contenant des tableaux associatifs
    $recuptous = $tous->fetchAll(PDO::FETCH_ASSOC);

}else{ // pas de résultats
    $error1 = "Pas encore d'articles";
}

/*
 * si on a cliqué sur un article et que c'est bien un entier numérique non signé
 */

if(isset($_GET['id'])&&ctype_digit($_GET['id'])){

    // transformation de $_GET['id'] en int
    $id = (int) $_GET['id'];

    // préparation de la requête, avec un marqueur non nommé (?)
    $un = $connexion->prepare("SELECT * FROM pdo1 WHERE id = ?");

    // exécution de la requête préparée avec comme argument un tableau contenant le marqueur non nommé (si plusieurs marqueurs dans l'ordre de gauche à droite), cette méthode est peu sécurisée, mais souvant utilisée quand le contrôle utilisateur est déjà bien complet
    $un->execute([$id]);

    // si on a un résultat
    if($un->rowCount()){
        $recupun = $un->fetch(PDO::FETCH_ASSOC);
    }else{
        $error2="404 Article introuvable";
    }

}

/*
 * on a cliqué sur le formulaire
 */

if(isset($_POST["prems"],$_POST["deums"])){

    /* transformation des champs en int
    $prems = (int) $_POST["prems"];
    $deums = (int) $_POST["deums"];

    // ils sont valides
    if(!empty($prems)&&!empty($deums)){

        // preparation de la requête avec bindValue

    }
    */


    // les marqueurs nommés sont des mots commençant par : (minuscule, pas d'espace ni caractère spéciaux)
    $sql = "SELECT * FROM pdo1 WHERE id >= :debut AND id <= :fin ";

    // préparation de la requête
    $tranche = $connexion->prepare($sql);

    // passage des arguments non sécurisés via bindValue en utilisant les marqueurs nommés lors du prepare (entre "" et sans les :)
    $tranche->bindValue("fin",$_POST["deums"],PDO::PARAM_INT);
    $tranche->bindValue("debut",$_POST["prems"],PDO::PARAM_INT);

    // execution de la requête
    $tranche->execute();

    if($tranche->rowCount()){
        $tabtranche = $tranche->fetchAll(PDO::FETCH_ASSOC);
        var_dump($tabtranche);
    }
}

/*
 * on a cliqué sur le formulaire 2
 */

if(isset($_POST["prems2"],$_POST["deums2"])){


    // les marqueurs nommés sont des mots commençant par : (minuscule, pas d'espace ni caractère spéciaux)
    $sql = "SELECT * FROM pdo1 WHERE id >= :debut AND id <= :fin ";

    // préparation de la requête
    $tranche = $connexion->prepare($sql);

    // execution de la requête
    $tranche->execute(["debut"=>$_POST["prems2"],"fin"=>$_POST["deums2"]]);

    if($tranche->rowCount()){
        $tabtranche = $tranche->fetchAll(PDO::FETCH_ASSOC);
        var_dump($tabtranche);
    }
}

?>
<html>
<head>
    <title></title>
</head>
<body>

<form action="" method="post" name="choix">
    prendre les articles de l'id <input name="prems" type="number" min="1" max="5" required> à l'id  <input name="deums" type="number" min="5" max="20" required>
    <input  type="submit" value="envoyer">
</form>

<form action="" method="post" name="choix2">
    prendre les articles de l'id <input name="prems2" type="number" min="1" max="5" required> à l'id  <input name="deums2" type="number" min="5" max="20" required>
    <input  type="submit" value="envoyer">
</form>

<?php
if(isset($error1)){
    echo "<h3>$error1</h3>";
}else{
    foreach ($recuptous as $item){
        echo "<h3><a href='?id=".$item['id']."'>".$item['nom']."</a></h3>";
    }
}
if(isset($error2)){
    echo "<h3>$error2</h3>";
}elseif(isset($id)) {
    ?>
    <h3>Détail de l'article</h3>
    <h4><?= $recupun["nom"] ?></h4>
    <p><?= $recupun["texte"] ?></p>
    <?php
}
?>
</body>
</html>
