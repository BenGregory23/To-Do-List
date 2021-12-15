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
    public static function connexion(string $pseudo, string $password) {

        global $dsn, $user, $mdp, $vues;
        $con = new Connection($dsn,$user,$mdp);

        $uG = new UserGateway($con);

        $pseudo=Nettoyage::nettoyer_string($pseudo);
        $password=Nettoyage::nettoyer_string($password);


        $loginDB = $uG->getLogin($pseudo);
        $passwordDB = $uG->getPassword($pseudo);

        if (($pseudo == $loginDB) && password_verify($password, $passwordDB[0])){
            $_SESSION['role']='Admin';
            $_SESSION['pseudo']=$pseudo;
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