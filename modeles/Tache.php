<?php

class Tache
{
    public int $id; //la base de donnée doit avoir un auto increment pour l'id
    public string $nom;
    public string $description;
    public EnumEtat $etat;

    public function __construct($id, $nom, $description, $etat){
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->etat = $etat;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getNom() : string{
        return $this->nom;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getEtat() : string {
        return $this->nom;
    }



}