<?php

class MdlUtilisateur
{
    public int $id;
    public string $email;
    public string $motDePasse;

    public function __construct(string $pseudo, string $mdp){

        global $base,$login,$mdpbase;

        $pseudo=Nettoyage::nettoyer_string($pseudo);
        $mdp=Nettoyage::nettoyer_string($mdp);
        $con=new Connection($base,$login,$mdpbase);
        $uG=new UserGateway($con);
        $mdp2=$uG->getPass($pseudo);

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