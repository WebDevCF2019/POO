<?php
require_once "../config.php";
/* mysqli
require_once "../mysqliConnect.php";
*/

// PDO
require_once "../connectPDO.php";

if(isset($_GET['id'])&& ctype_digit($_GET['id'])){

    $id = (int) $_GET['id'];

    /* mysqli

    $sql = "DELETE FROM articles WHERE idarticles = $id";

    mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

    */
    
    // PDO
    $sql = "DELETE FROM articles WHERE idarticles = :lid";

    $delete = $connexion->prepare($sql);

    $delete->execute(array("lid"=>$id));

    header("Location: accueiladmin.php");

}else{
    header("Location: ../");
    exit;
}