<?php

class Tache
{
    public $id; //la base de donnée doit avoir un auto increment pour l'id
    public $nom;
    public $description;
    public EnumEtat $etat;

    public function __construct($id, $nom, $description, $etat){
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->etat = $etat;
    }

}