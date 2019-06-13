<?php

/*
 * Manageur de l'instance de type "thesection", il peut servir à la création de différentes formes de CRUD, mais également aux actions et interactions entre instances (par exemple afficher les étudiants d'une section)
 */

class thesectionManager
{
    private $db; // connexion MyPDO (PDO étendue)

    public function __construct(MyPDO $connect ) // passage de la connexion
    {
        $this->db = $connect;
    }

    // actions (méthodes) généralement publiques car exécutées depuis un contrôleur, dont le nom est généralement un verbe, applicable aux instances de thesection


    // création du menu qui nous renvoie un tableau
    public function creerMenu(): array {
        $sql = "SELECT idthesection,thetitle FROM thesection ORDER BY thetitle ASC ;";
        $recup = $this->db->query($sql);

        if($recup->rowCount()===0){
            return [];
        }else{
            return $recup->fetchAll(PDO::FETCH_ASSOC);
        }

    }

    // création de l'affichage de toutes les sections sur l'accueil publique du site
    public function selectionnerSectionIndexPublic(): array {
        $sql = "SELECT * FROM thesection ORDER BY thetitle ASC ;";
        $recup = $this->db->query($sql);

        if($recup->rowCount()===0){
            return [];
        }else{
            return $recup->fetchAll(PDO::FETCH_ASSOC);
        }

    }


}
