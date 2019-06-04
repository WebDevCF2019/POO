<?php
/*
 * Public
 */

$a = new theuser();

echo $a->getThelogin();
$a->setThepwd(" lulu");
echo "<br>{$a->getThepwd()}<br>";



$b = new theuser(
                ["idtheuser"=>"5",
                "thelogin"=>"Stef<br>an",
                "thepwd"=>" lulu "]
);

var_dump($b);