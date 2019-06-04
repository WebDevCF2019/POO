<?php


class theuser
{
    // attributs
    protected $idtheuser;
    protected $thelogin;
    protected $thepwd;

    // méthodes

        // constructeur
    public function __construct(array $datas = [])
    {
        // tableau vide
        if(empty($datas)){

            // login anonyme
            $this->thelogin = "Anonyme";
        }else{
            // ICI
        }
    }

    // getters

    public function getIdtheuser(){
        return $this->idtheuser;
    }
    public function getThelogin(){
        return html_entity_decode($this->thelogin,ENT_QUOTES);
    }
    public function getThepwd(){
        return $this->thepwd;
    }



    // setters

    public function setIdtheuser(int $idtheuser): void
    {
        if(!empty($idtheuser)) {
            $this->idtheuser = $idtheuser;
        }
    }
    public function setThelogin(string $thelogin): void
    {
        $this->thelogin = htmlspecialchars(strip_tags(trim($thelogin)),ENT_QUOTES);
    }
    public function setThepwd(string $thepwd): void
    {
        $this->thepwd = $this->sha256(trim($thepwd));
    }

    // methodes protected

    protected function sha256(string $arg){
        return hash("sha256",$arg);
    }

}