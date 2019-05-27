<?php
// on récupère les dépendances (! un dossier en dessous ../
require_once "../config.php";
require_once "../mysqliConnect.php";


// si le formulaire a été envoyé
if(isset($_POST['titre'],$_POST['texte'],$_POST['users_id'])){

    // on va récupérer les champs dans des variables locales

    $titre = htmlspecialchars(strip_tags(trim($_POST['titre'])), ENT_QUOTES);

    $texte = htmlspecialchars(strip_tags($_POST['texte']),ENT_QUOTES);

    $user_id = (int) $_POST['users_id'];


    // après traîtement, on vérifie si (au moins une de) nos variables ne sont pas vides
    if( !empty($titre)&&
        !empty($texte)&&
        !empty($user_id)){

        $sql = "INSERT INTO articles (thetitle,thetext,users_idusers) VALUES ('$titre','$texte',$user_id)";

        mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

        header("Location: accueiladmin.php");

    }

}





// on récupère tous les auteurs pour les proposer comme auteur du nouvel article (<select><option> en html)

$sql = "SELECT idusers,thename FROM users ORDER BY thename ASC";
$recup_users = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

// pas encore d'utilisateur
if(mysqli_num_rows($recup_users)===0){

    // problème grave redirection hors de l'admin
    header("Location: ../");

}else{
    // au moins un utilisateur
    $users = mysqli_fetch_all($recup_users, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Moi">

    <title>Administration - nouvel article</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
                <li class="nav-item">
                    <a class="nav-link" href="accueiladmin.php">Accueil Admin

                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addarticles.php">Ajouter un article <span class="sr-only">(current)</span></a>
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
            <p class="lead">Ajoutez un article</p>
            <p class="float-left">Annuler l'insertion d'un article<hr></p>

            <!--
https://getbootstrap.com/docs/4.0/components/forms/
-->

        <form action="" method="post">
            <div class="form-group">
            <label>Titre de l'article</label>
            <input name="titre" maxlength="100" type="text" class="form-control" required>

            <label>Texte de l'article</label>
            <textarea name="texte" class="form-control" rows="5" required></textarea>

            <label>Choix de l'auteur</label>
            <select name="users_id" class="custom-select custom-select-sm" required>
                <?php
                foreach($users AS $item) {
                    ?>
                    <option value="<?=$item['idusers']?>"><?=$item['thename']?></option>
                    <?php
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Insérer</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/startbootstrap-bare-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
var_dump($_POST);