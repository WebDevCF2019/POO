<?php
// on récupère les dépendances (! un dossier en dessous ../
require_once "../config.php";
require_once "../mysqliConnect.php";


// on récupère tous articles déja présents

$sql = "SELECT * FROM articles ORDER BY thedate DESC";
$recup_art = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

// pas encore d'articles
if(mysqli_num_rows($recup_art)===0){
    $vide = "pas encore d'articles";
}else{
    // au moins un article
    $pasvide = mysqli_fetch_all($recup_art, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Moi">

    <title>Administration</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function deleteArticle(ID){
            var confirmation = confirm("Voulez-vous vraiment supprimer l'article dont l'id est "+ID);
            // la personne accepte
            if(confirmation){
                // redirection vers la page de suppression d'article
                document.location.href = "deletearticles.php?id="+ID;
            }else{
                return false;
            }

        }
    </script>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="#">Administration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil Admin
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addarticles.php">Ajouter un article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../">déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Administration</h1>
            <p class="lead">Liste des articles</p>
            <p class="float-left"><a href="addarticles.php"><img src="../img/add.png"> Ajouter un article</a></p>
            <table class="float-left" border="1" cellspacing="2">
                <tr>
                    <th>idarticles</th>
                    <th>thetitle</th>
                    <th>thetext</th>
                    <th>thedate</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </tr>
                <?php
                foreach ($pasvide AS $item){
                ?>
                <tr>
                    <td><?=$item['idarticles']?></td>
                    <td><?=$item['thetitle']?></td>
                    <td><?=substr($item['thetext'],0,150)?> ... </td>
                    <td><?=$item['thedate']?></td>
                    <td>
                        <a href="updatearticles.php?id=<?=$item['idarticles']?>"><img src="../img/edit.png"></a></td>
                    <td>
                        <a href="#" onclick="deleteArticle(<?=$item['idarticles']?>); return false;"><img src="../img/delete.png"></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>