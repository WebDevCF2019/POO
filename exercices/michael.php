<?php


class michael
{
    // Attributs
    private $dateNaissance;
    private $prenom;
    private $nom;
    private $surnom;
    private $nationalite;

    // Constante
    const GENRE = "M";

    // Méthodes


    // Constructeur (appelé lors de l'instanciation => new michael, sert généralement à passer des paramètres à l'instance de classe lors de sa création)
    public function __construct(array $tab = [])
    {
        // si on passe des arguments de type tableau au constructeur (new michael([arguements...]))
        if (!empty($tab)) {

            // on va tenter d'hydrater (donner des valeurs venant d'un tableau à chaque (certains) attributs non publiques en utilsant un méthode créant les setters)

            $this->hydrate($tab);

            /* on peut hydrater manuellement en utilisant les setters et les clefs du tableau, c'est ce que font les robots car ils n'ont pas d'hydratateurs, risque d'erreurs si le tableau ne contient pas les bonnes clefs

            // bonne pratique si pas de fonction d'hydratation
            $this->setNom($tab['nom']);
            $this->setDateNaissance($tab['dateNaissance']);

            // mauvaise pratique sans hydratation
            $this->nom = "quelque chose";

            */


        }
    }


    // méthode d'hydratation (crée les setters depuis les clef du tableau $data, si ces setters existe on les utilises pour changer les valeurs des attributs)

    private function hydrate(array $datas){

        // tant qu'on a des éléments dans le tableau
        foreach ($datas as $key => $value){

            // création du nom du setter en partant de la clef du tableau ("nom" => "setNom")
            $setterName = "set".ucfirst($key);

            // on vérifie si le setter existe bien dans cette instance de classe
            if(method_exists($this,$setterName)){

                // on lui attribue la valeur ("nom"=>"Mike" | $this->setNom("Mike"))
                $this->$setterName($value);
            }

        }


    }


    // Getters (permet d'afficher des attributs non publiques en dehors de la classe -> méthodes publiques)


    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getSurnom()
    {
        return $this->surnom;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }

    // Setters (permettent de modifier les attributs, depuis l'extérieurs si publiques), c'est ici que l'on va protéger nos attributs d'instances contre d'éventuelles attaques/erreurs


    public function setDateNaissance(int $dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }

    public function setPrenom(string $prenom): void
    {
        $prenom = htmlspecialchars(strip_tags(trim($prenom)),ENT_QUOTES);
        if(!empty($prenom)) {
            $this->prenom = $prenom;
        }
    }

    public function setNom(string $nom): void
    {
        $nom = htmlspecialchars(strip_tags(trim($nom)),ENT_QUOTES);
        if(!empty($nom)) {
            $this->nom = $nom;
        }
    }

    public function setSurnom(string $surnom): void
    {
        $surnom = htmlspecialchars(strip_tags(trim($surnom)),ENT_QUOTES);
        if(!empty($surnom)) {
            $this->surnom = $surnom;
        }
    }

    public function setNationalite(string $nationalite): void
    {
        $nationalite = htmlspecialchars(strip_tags(trim($nationalite)),ENT_QUOTES);
        if(!empty($nationalite)) {
            $this->nationalite = $nationalite;
        }
    }




}
