<?php

class MdlUtilisateur
{


    public function __construct(){
    }

    public function connexion($login, $password)
    {
        global $con;
        $userGw = new UserGateway($con);
        global $vues;
        Nettoyage::nettoyer_string($login);
        Nettoyage::nettoyer_string($password);

        $loginDB = $userGw->getLogin($login);
        $passwordDB = $userGw->getPassword($login);

        /*
        echo $loginDB[0]['pseudo'];
        echo $passwordDB[0]['password'];
        */

        if (($login == $loginDB[0]['pseudo']) && /*password_verify($password, $passwordDB[0]*/ ($password == $passwordDB[0]['password'])) {
            $_SESSION['role'] = 'user';
            $_SESSION['login'] = $login;

        }else{


            require $vues['erreur'];
        }
    }

    public function isUser(): bool
    {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])){
            $role = Nettoyage::nettoyer_string($_SESSION['role']);
            $login = Nettoyage::nettoyer_string($_SESSION['login']);
            return true;
        }else{
            return false;
        }
    }

    public function deconnexion(){
        session_destroy();
    }
}