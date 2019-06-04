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
echo "<hr><h3>Exercice 1</h3>";

$c = new thestudent();

echo $c->getThename();



$d = new thestudent(
    ["idthestudent"=>"66",
        "thename"=>"<p>Mic<br>ha</p>",
        "thesurname"=>"Greg"]
);

var_dump($d);

echo "<hr><h3>Exercice 2</h3>";

$e = new thesection();

echo $e->getThetitle();



$f = new thesection(
    ["idthesection"=>"78",
        "thetitle"=>"<p>Mic<br>ha</p>ël",
        "thedesc"=>"Greg aime les poulettes"]
);

var_dump($f);