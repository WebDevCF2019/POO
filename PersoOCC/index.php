<?php
require_once 'Personnage.php';
require_once 'Magicien.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
  // instanciation sans paramètres      
  $user1 = new Personnage();
  // utilisation des setters public
  $user1->setNickName("Jilian");
  $user1->setSante(120);
  $user1->setEndurance(8);
  $user1->setForce(12);
  // utilisation de l'hydratation pour utiliser nos setters
  $user2 = new Personnage(
          array(
            "sante"=>95,
            "endurance"=>11,
            "force"=>11,
            "lulu"=>"-- Insert INTO"  ,
              "nickName"=>"Stéphane"
              ));
  //utilisation de l'hydratation pour utiliser nos setters, mais ceux-ci n'existe pas => valeurs par défaut
  $user3 = new Personnage(["h"=>"khykg","uhgu"=>5]);
  $user4 = new Personnage();
  $user5 = new Magicien();
        ?>
        <pre><?php
           var_dump($user1,$user2,$user3,$user4,$user5);
           ?>
        </pre>
    </body>
</html>
