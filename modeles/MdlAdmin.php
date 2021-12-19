<?php

class MdlAdmin
{

    private string $dsn;

    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public static function connexion(string $login, string $password) {
        global $vues, $con;

        $uG = new UserGateway($con);

        $login = Nettoyage::nettoyer_string($login);
        $password = Nettoyage::nettoyer_string($password);


        $loginDB = $uG->getLogin($login);
        $passwordDB = $uG->getPassword($login);

        if (($login == $loginDB) && password_verify($password, $passwordDB[0])){
            $_SESSION['role']='Admin';
            $_SESSION['login']=$login;
        }
        else require $vues['erreur'];
    }

    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public function isAdmin(): Utilisateur {
        if(isset($_SESSION['pseudo']) && isset($_SESSION['role'])){
            $pseudo=Nettoyage::nettoyer_string($_SESSION['pseudo']);
            $role=Nettoyage::nettoyer_string($_SESSION['role']);
            if ($pseudo == "" || $role == "") return new Utilisateur();
            return new Utilisateur($pseudo,$role);
        }
        return new Utilisateur();
    }

}