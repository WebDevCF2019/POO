<?php
/*
 * Public
 */

$a = new theuser();

echo $a->getThelogin();
$a->setThepwd(" lulu");
echo "<br>{$a->getThepwd()}";

$b = new theuser(
                ["idtheuser"=>"5",
                "thelogin"=>"Stef<br>an",
                "thepwd"=>" lulu "]
);