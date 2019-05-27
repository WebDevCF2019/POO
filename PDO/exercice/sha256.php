<?php
function sha256($chaine){
    return hash("sha256",$chaine);
}


$pass = "User1";

echo $pass." | ".sha256($pass)."<br>";

$pass = "User2";

echo $pass." | ".sha256($pass)."<br>";

$pass = "User3";

echo $pass." | ".sha256($pass)."<br>";
