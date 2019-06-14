<?php

/*
 * Manager de theuser
 */
class theuserManager
{
    private $db;

    public function __construct(MyPDO $connect)
    {
        $this->db = $connect;
    }

    // on essaie de se connecter
    public function connecterUser(theuser $user): bool {

        $sql = "SELECT idtheuser, thelogin FROM theuser
		WHERE thelogin = :login AND thepwd = :pwd ;";

        $connectUser = $this->db->prepare($sql);
        $connectUser->bindValue("login",$user->getThelogin(),PDO::PARAM_STR);
        $connectUser->bindValue("pwd",$user->getThepwd(),PDO::PARAM_STR);
        $connectUser->execute();

        // si on a récupéré l'utilisateur (connexion réussie)
        if($connectUser->rowCount()){
            // on crée la session avec les valeurs venant de la table theuser
            $this->creerSession($connectUser->fetch(PDO::FETCH_ASSOC));

            return true;

        }else{
            return false;
        }
    }

    // on a réussi la connexion
    private function creerSession(array $valeurs){
        $_SESSION = $valeurs;
        $_SESSION["myKey"]= session_id();
    }
}