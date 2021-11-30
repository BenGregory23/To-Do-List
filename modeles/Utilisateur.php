<?php

class Utilisateur
{
    public int $id;
    public string $email;
    public string $motDePasse;

    public function __construct( int $id, string $email, string $motDePasse){
        $this->id = $id;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    public function getId() : int{
        return $this->id;
    }

    public function getEmail() : string{
        return $this->email;
    }

    public function getMessage() : string{
        return $this->motDePasse;
    }


}