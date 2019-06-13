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
    public function connecterUser(theuser $user): array {

    }
}