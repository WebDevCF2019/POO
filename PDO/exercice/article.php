<?php
$sql = "SELECT a.*, u.thename
	FROM articles a
    INNER JOIN users u
		ON a.users_idusers = u.idusers
    WHERE a.idarticles = $idarticle;";

$recup_art = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

// si on a un article
if(mysqli_num_rows($recup_art)){
    $item = mysqli_fetch_assoc($recup_art);
}else{
    $message = "Cet article n'existe plus ou a été déplacé.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Moi">

    <title>Détail de l'article</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">Article3 Détail de l'article</a>
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
            if(isset($message)) {

                ?>
                <h1 class="mt-5"><?=$message?></h1>
                <?php
            }else {
                ?>
                <h1 class="mt-5"><?=$item['thetitle']?></h1>
                <p class="lead">Par <a href="?iduser=<?=$item['users_idusers']?>"><?=$item['thename']?></a></p>
                <p class="text-left"><?=nl2br($item['thetext'])?></p>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>