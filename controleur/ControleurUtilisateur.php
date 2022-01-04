<?php


use JetBrains\PhpStorm\NoReturn;

class ControleurUtilisateur
{
    public function __construct(){

        global $rep, $vues;
        $dVueErreur = array();

        $listeAction = array('ajouterTache', 'ajouterListe', 'ajouterListePv', 'supprimerListePv', 'deconnexion', 'accueil');
        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL :
                    $this->reinit();
                    break;

                case 'deconnexion' :
                    $this->deconnexion();
                    break;

                case 'ajouterTache' :
                    $this->ajouterTache();
                    break;

                case 'ajouterListe' :
                    $this->ajouterListe();
                    break;

                case 'ajouterListePv' :
                    $this->ajouterListePv();
                    break;

                default :
                    echo 'DEFAULT USER';
            }
        }
        catch(Exception $e){
            echo $e;
        }
    }

    function accueil(){
        global $rep,$vues;

        $user = MdlUtilisateurConnecte::isUserCo();

        $mdlListe = new MdlListe();
        $tabListes = $mdlListe->mdlFindAllListes();

        require ($rep.$vues['accueil']);
        exit(0);
    }


    /**
     * @throws Exception
     */
    function ajouterTache(){
        $nom = $_REQUEST["nom"];
        $desc = $_REQUEST["description"];
        $idListe = 1; //POUR LE MOMENT TOUS VAS DANS LA LISTE 1
        if($nom && $desc){
            $tache = new Tache();
            $tache->ajouterTache($nom, $desc, $idListe);
        }
        $this->reinit();
    }

    function ajouterListe(){
        $nom = $_REQUEST["nom"];
        $desc = $_REQUEST["description"];
        $pseudo = $_REQUEST["pseudo"];
        if($nom && $desc){
            $liste = new Liste();
            $liste->ajouterListe($nom, $desc, true, $pseudo);
        }
        $this->reinit();
    }

    function deconnexion(){
        global $rep,$vues;
        MdlUtilisateurConnecte::deconnexion();
        $this->accueil();
    }



    public function reinit(){
        global $rep, $vues;
        require ($vues['accueil']);
    }
}