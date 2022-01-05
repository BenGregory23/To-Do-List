<?php

class MdlUtilisateur
{


    public function __construct(){
    }

    /**
     * @throws Exception
     */
    public function connexion($login, $password)
    {
        global $con, $vues;
        $userGw = new UserGateway($con);

        $login= Nettoyage::nettoyer_string($login);
        $password = Nettoyage::nettoyer_string($password);

        $loginDB = $userGw->getLogin($login);
        $passwordDB = $userGw->getPassword($login);

        if (($login == $loginDB[0]['pseudo']) && password_verify($password, $passwordDB[0]['password'])   /*$password== $passwordDB[0]['password']*/) {
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
}