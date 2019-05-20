<?php
require_once "michael.php";

$p1 = new michael();
$p2 = new michael(
    ["dateNaissance"=>1977,
     "prenom"=>"Michaël",
     "nom"=>"Pitz",
     "surnom"=>"Balou",
     "nationalite"=>"Belge"
        ]
);


echo 'michael::GENRE =>'.michael::GENRE; // affiche "M"
echo "<br>";

// utilisation d'un setters pour changer le nom
$p1->setNom("Lulu");

//
echo $p1->getNom();


/*
echo $p2->afficheMaFiche(); //

<p>
Votre Fiche:<br>
dateNaissance: 1977<br>
prenom: Michaël<br>
nom: Pitz<br>
surnom: Balou<br>
nationalite: Belge
</p>

*/
?>
<pre><?php
    var_dump($p1,$p2);
    ?></pre>
