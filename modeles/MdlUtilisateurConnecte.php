<?php


class MdlUtilisateurConnecte
{
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public static function connexion(string $pseudo, string $password): ?Utilisateur
    {

        global $dsn, $user, $mdp;

        $pseudo=Nettoyage::nettoyer_string($pseudo);
        $password=Nettoyage::nettoyer_string($password);

        $con=new Connection($dsn,$user,$mdp);
        $uG=new UserGateway($con);

        $mdp2=$uG->getPassword($pseudo);

        if (password_verify($password,$mdp2[0]["mdp"])){
            $_SESSION['role']='userCo';
            $_SESSION['pseudo']=$pseudo;
            return self::recupListesUser();
        }
        else return null;
    }

    public static function inscription(string $pseudo, string $password): Utilisateur
    {

        global $dsn,$user,$mdp;

        $pseudo=Nettoyage::nettoyer_string($pseudo);
        $password=Nettoyage::nettoyer_string($password);

        $con=new Connection($dsn,$user,$mdp);
        $userGateway =new UserGateway($con);

        $password=password_hash($password,PASSWORD_DEFAULT);
        $userGateway->inscription($pseudo,$password);


        $_SESSION['role']='userCo';
        $_SESSION['pseudo']=$pseudo;
        return self::recupListesUser();

    }

    public static function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public static function isUserCo(): Utilisateur
    {
        if (isset($_SESSION['pseudo']) && isset($_SESSION['role'])){
            $pseudo=Nettoyage::nettoyer_string($_SESSION['pseudo']);
            $role=Nettoyage::nettoyer_string($_SESSION['role']);
            if ($pseudo == "" || $role == "") return new Utilisateur();
            return new Utilisateur($pseudo,$role);
        }
        return new Utilisateur();
    }

    public static function recupListesUser(): Utilisateur
    {
        global $base,$login,$mdpbase;
        $user = self::isUserCo();
        if ($user->getPseudo() != "" && $user->getRole() == "userCo") {
            $lG = new ListeGateway(new Connection($base, $login, $mdpbase));
            $pseudo = Nettoyage::nettoyer_string($_SESSION['pseudo']);

            //$taches=[];
            $listesPriv = [];
            $listesPub = [];
            $listesAbo = [];

            $listes_res = $lG->getListesPriv($pseudo);
            foreach ($listes_res as $liste) {
                $listesPriv[] = new Liste(intval($liste["idListe"]), $liste["nomListe"], $liste["descListe"], $liste["isPublic"], $liste["pseudo"]);
            }

            $listes_res = $lG->getListesPub($pseudo);
            foreach ($listes_res as $liste) {
                $listesPub[] = new Liste(intval($liste["idListe"]), $liste["nomListe"], $liste["descListe"], $liste["isPublic"], $liste["pseudo"]);
            }

            return new Utilisateur($pseudo, "userCo", $listesPriv, $listesPub);
        }
        return $user;
    }

    public static function recupData(Utilisateur $user){
        if ($user!=null){
            $mdlTaches = new MdlTaches();
            $listes = $user->getListesPriv();
            if (isset($listes) && !empty($listes)) {
                $id = $listes[0]->getIdListe();
            } else {
                $listes = $user->getListesPub();
                if (isset($listes) && !empty($listes)) {
                    $id = $listes[0]->getIdListe();
                } else {
                    $listes = $user->getListesAbo();
                    if (isset($listes) && !empty($listes)) {
                        $id = $listes[0]->getIdListe();
                    }
                }
            }
            if (isset($id)) return $mdlTaches->find_Liste_Taches($id);
            return null;
        }
        return null;
    }

}
