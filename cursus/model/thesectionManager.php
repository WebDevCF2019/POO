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

    /*
     *
     *
     * Méthodes pour la partie publique du site
     *
     *
     *
     */

    // création du menu qui nous renvoie un tableau
    public function creerMenu(): array {
        $sql = "SELECT idthesection,thetitle FROM thesection ORDER BY thetitle ASC ;";
        $recup = $this->db->query($sql);

        if($recup->rowCount()===0){
            return [];
        }
            return $recup->fetchAll(PDO::FETCH_ASSOC);


    }

    // création de l'affichage de toutes les sections sur l'accueil publique du site
    public function selectionnerSectionIndexPublic(): array {
        $sql = "SELECT * FROM thesection ORDER BY thetitle ASC ;";
        $recup = $this->db->query($sql);

        if($recup->rowCount()===0){
            return [];
        }
            return $recup->fetchAll(PDO::FETCH_ASSOC);

    }

    // récupération d'une section d'après son id (détail des sections)
    public function selectionnerSectionParId(int $idsection): array {
        // si la variable vaut 0 (id ne peux valoir 0 ou la conversion a donné 0)
        if(empty($idsection)){
            return [];
        }
        $sql = "SELECT * FROM thesection WHERE idthesection = ? ;";
        $recup = $this->db->prepare($sql);
        $recup->bindValue(1,$idsection,PDO::PARAM_INT);
        $recup->execute();

        if($recup->rowCount()===0){
            return [];
        }
        return $recup->fetch(PDO::FETCH_ASSOC);

    }


    /*
     *
     *
     * Méthodes pour l'admin du site
     *
     *
     */

    // création de l'affichage de toutes les sections avec ses utilisateurs sur l'accueil de l'administration du site
    public function selectionnerSectionIndexAdmin(): array {
        $sql = "SELECT a.idthesection, a.thetitle, LEFT(a.thedesc,120) AS thedesc,
	GROUP_CONCAT(c.thename SEPARATOR '|||') AS thename, 
    GROUP_CONCAT(c.thesurname SEPARATOR '|||') AS thesurname
	FROM thesection a
		LEFT JOIN thesection_has_thestudent b
			ON a.idthesection = b.thesection_idthesection
		LEFT JOIN thestudent c
			ON b.thestudent_idthestudent = c.idthestudent
    GROUP BY a.idthesection        
    ;";
        $recup = $this->db->query($sql);

        if($recup->rowCount()===0){
            return [];
        }
        return $recup->fetchAll(PDO::FETCH_ASSOC);

    }

}
