<?php
/*
 * Classe de connexion à notre base de donnée basée sur PDO
 */

class MyPDO extends PDO
{

    // constructeur de MyPDO
    public function __construct($dsn, $username = null, $passwd = null, $options = null, $product = false)
    {
        // on copie le constructeur de PDO (le parent)
        parent::__construct($dsn, $username, $passwd, $options);

        // et on rajoute $product qui est propre à MyPDO
        if ($product === false) {
            // affichage des erreurs
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
    }


}