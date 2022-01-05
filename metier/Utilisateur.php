<?php

class Utilisateur
{
    public $login;
    private $password;
    public $role;
    public $listePublique;
    public $listePrive;

    public function __construct()
    {
        $arguments=func_get_args();
        $nbArguments=func_num_args();
        if ($nbArguments==0) call_user_func_array(array($this,"__construct0"),$arguments);
        if ($nbArguments==2) call_user_func_array(array($this,"__construct1"),$arguments);
        if ($nbArguments==3) call_user_func_array(array($this,"__construct2"),$arguments);
        if ($nbArguments==4) call_user_func_array(array($this,"__construct3"),$arguments);
        if ($nbArguments==5) call_user_func_array(array($this,"__construct4"),$arguments);

    }

    private static function getUserList()
    {
    }

    public function __construct0(){
        $this->login = "";
    }

    public function __construct1(string $email, string $etat){
        $this->login = "";
        $this->role = $etat;
    }

    public function __construct2(string $email, string $etat, array $listePrive){
        $this->login = "";
        $this->role = $etat;
        $this->listePrive = $listePrive;
    }

    public function __construct3(string $email, string $etat, array $listePrive, array $listePublique){
        $this->login = "";
        $this->role = $etat;
        $this->listePrive = $listePrive;
        $this->listePublique = $listePublique;
    }

    public static function connexion(string $pseudo, string $mdp){

        global $base,$login,$passwordUser;

        $pseudo=Nettoyage::nettoyer_string($pseudo);
        $passwordUser=Nettoyage::nettoyer_string($mdp);

        $con=new Connection($base,$login,$passwordUser);
        $passwordVerification = new UserGateway($con);

        if (password_verify($passwordUser,$passwordVerification[0]["mdp"])){
            $_SESSION['role']='userCo';
            $_SESSION['pseudo']=$pseudo;
            //$_SESSION['id']=$id;
            return self::getUserList();
        }
        else return null;


    }

    public function getLogin() : string{
        return $this->login;
    }

    public function getPassword() : string{
        return $this->password;
    }

    public function getRole() : string{
        return $this->role;
    }

    public function isUserConncected() : Utilisateur
    {
        if (isset($_SESSION['login']) && isset($_SESSION['role'])){
            $login=Nettoyage::nettoyer_string($_SESSION['login']);
            $role=Nettoyage::nettoyer_string($_SESSION['role']);
            if ($login == "" || $role == "") return new Utilisateur();
            return new Utilisateur($login,$role);
        }
        return new Utilisateur();

    }
}