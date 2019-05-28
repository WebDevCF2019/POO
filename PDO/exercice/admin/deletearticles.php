<?php
require_once "../config.php";
/* mysqli
require_once "../mysqliConnect.php";
*/

// PDO

if(isset($_GET['id'])&& ctype_digit($_GET['id'])){

    $id = (int) $_GET['id'];

    /* mysqli

    $sql = "DELETE FROM articles WHERE idarticles = $id";

    mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

    */
    
    // PDO

    header("Location: accueiladmin.php");

}else{
    header("Location: ../");
    exit;
}