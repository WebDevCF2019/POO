<?php

// requête

$sql = "SELECT a.idarticles, a.thetitle, LEFT(a.thetext,300) AS thetext,
	a.thedate, u.thename, u.idusers
	FROM articles a
    INNER JOIN users u
		ON a.users_idusers = u.idusers
	ORDER BY a.thedate DESC;";


/*mysqli

$recup_art = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

if(mysqli_num_rows($recup_art)){
    $array_art = mysqli_fetch_all($recup_art, MYSQLI_ASSOC);
}else{
    $message = "Pas encore d'articles";
}
*/

/*
 * PDO
 */
$recup_art =$connexion->query($sql);
if($recup_art->rowCount()){
    $array_art=$recup_art->fetchAll(PDO::FETCH_ASSOC);
}else{
    $message = "Pas encore d'articles";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Article3 Accueil</title>

    <!-- Bootstrap core CSS -->
<link href="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">Article3 Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
            <h1 class="mt-5">Article3 Accueil</h1>
            <p class="lead">Affichage de tous nos article.</p>
            <?php
            if(isset($message)){
                ?>
<h3>Pas encore d'articles sur le site</h3>
            <?php
            }else{
            ?>
            <div class="text-left">
                <?php
                foreach ($array_art as $item) {
                    ?>
                    <h4><a href="?idarticle=<?= $item['idarticles'] ?>"><?= $item['thetitle'] ?></a> | <small><?= $item['thedate'] ?></small></h4>
                    <p><?= $item['thetext'] ?> ... <a href="?idarticle=<?= $item['idarticles'] ?>">Lire la suite</a></p>
                    <h5>Par <a href="?iduser=<?=$item['idusers']?>"><?= $item['thename'] ?></a></h5> <hr>

                    <?php
                }
            }
            ?></div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
