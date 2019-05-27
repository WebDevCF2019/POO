<?php
require_once "../config.php";
require_once "../mysqliConnect.php";

if(isset($_GET['id'])&& ctype_digit($_GET['id'])){

    $id = (int) $_GET['id'];

    $sql = "DELETE FROM articles WHERE idarticles = $id";

    mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

    header("Location: accueiladmin.php");

}else{
    header("Location: ../");
    exit;
}