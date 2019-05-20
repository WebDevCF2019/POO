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
        if (!empty($tab)) {
            $this->hydrate($tab);
        }
    }


    // méthode d'hydratation (crée les setters depuis les clef du tableau $data, si ces setters existe on les utilises pour changer les valeurs des attributs)

    private function hydrate(array $datas){
        foreach ($datas as $key => $value){
            $setterName = "set".ucfirst($key);
            if(method_exists($this,$setterName)){
                $this->$setterName($value);
            }
        }
    }

    // fonction publique de création de fiche
    public function afficheMaFiche(){
        return "<p>Votre Fiche:<br>
dateNaissance: {$this->getDateNaissance()}<br>
prenom: {$this->getPrenom()}<br>
nom: {$this->getNom()}<br>
surnom: {$this->getSurnom()}<br>
nationalite: {$this->getNationalite()}</p>";
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

    public function getNom(bool $maj=false)
    {
        if($maj){
            return strtoupper($this->nom);
        }
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
