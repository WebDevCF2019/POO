<?php

/*mysqli
$sql = "SELECT idusers, thelogin,thename FROM users WHERE 
idusers = $iduser;";

$recup_user = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

// si on a un utilisateur
if (mysqli_num_rows($recup_user)) {

    // transformation de users en tableau associatif (1 ligne)
    $item = mysqli_fetch_assoc($recup_user);

    $sql = "SELECT idarticles, thetitle, 
              LEFT(thetext,300) AS thetext, thedate
	        FROM articles 
              WHERE users_idusers=$iduser
            ORDER BY thedate DESC";

    $recup_art = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    // si on a au moins un article (ou plus)
    if (mysqli_num_rows($recup_art)) {

        // on va mettre dans un tableau indexé les résultats au format tableau associatif

        $articles = mysqli_fetch_all($recup_art, MYSQLI_ASSOC);

    } else {
        $message_art = "Cet utilisateur n'a pas encore écrit d'article";
    }

} else {
    $message = "Cet utilisateur n'existe pas.";
}

*/

/*
 * PDO
 */

$sql = "SELECT idusers, thelogin,thename FROM users WHERE 
idusers = ?;";

$recup_user = $connexion->prepare($sql);

$recup_user->execute([$iduser]);

if($recup_user->rowCount()){
    $item = $recup_user->fetch(PDO::FETCH_ASSOC);
    $sql = "SELECT idarticles, thetitle, 
              LEFT(thetext,300) AS thetext, thedate
	        FROM articles 
              WHERE users_idusers=?
            ORDER BY thedate DESC";
    $recup_art = $connexion->prepare($sql);
    $recup_art->bindValue(1,$iduser,PDO::PARAM_INT);
    $recup_art->execute();
    if($recup_art->rowCount()){
        $articles = $recup_art->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $message_art = "Cet utilisateur n'a pas encore écrit d'article";
    }
}else {
    $message = "Cet utilisateur n'existe pas.";
}



// JE SUIS TROP FORT #

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Moi">

    <title>Détail de l'utilisateur</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">Article3 Détail de l'utilisateur</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./">Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?connect">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <?php
            if (isset($message)) {

                ?>
                <h1 class="mt-5"><?= $message ?></h1>
                <?php
            } else {
                ?>
                <h1 class="mt-5"><?= $item['thename'] ?></h1>
                <p class="lead">Login: <?= $item['thelogin'] ?></p>
                <p class="text-left">idusers: <?= $item['idusers'] ?></p><div class="text-left">
                <?php

                // pas encore d'articles
                if (isset($message_art)) {
                    ?>
                    <h4><?= $message_art ?></h4>
                    <?php
                } else {

                    foreach ($articles AS $item2) {

                        ?>
                        <h3><a href="?idarticle=<?= $item2['idarticles'] ?>"><?= $item2['thetitle'] ?></a> |
                            <small><?= $item2['thedate'] ?></small>
                        </h3>
                        <p><?= $item2['thetext'] ?> ... <a href="?idarticle=<?= $item2['idarticles'] ?>">Lire la suite</a>
                        </p>
                        <hr><?php


                    }

                }
            }
            ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>