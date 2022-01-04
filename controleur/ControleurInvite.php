<?php

use JetBrains\PhpStorm\NoReturn;

class ControleurInvite
{
    public function __construct($action){

        global $rep, $vues;
        $dVueErreur = array();

        try {
            switch ($action) {
                case 'Accueil':
                case NULL :
                    $this->accueil();
                    break;
                case 'Inscription' :
                    require $vues['inscription'];
                    break;
                case "validerInscription" :
                    $this->inscription();
                    break;
                case 'Connexion' :
                    require $vues['connexion'];
                    break;
                case 'validerConnexion' :
                    $this->connexion();
                    break;
                case 'ajouterTachePb' :
                    $this->ajouterTachePb();
                    break;
                case 'ajouterListePb' :
                    $this->ajouterListePb();
                    break;
                case 'voirListePb':
                    $this->voirTachesListe();
                    break;
                case 'ajouterListe' :
                    break;
                default :
                    require ($rep.$vues['accueil']);
                    break;

            }
        }
        catch (Exception $e)
        {
            $dVueErreur[] ="Error not expected";
            require ($rep.$vues['accueil']);
        }
        exit(0);
    }

    public function connexion(){
        global $rep, $vues, $dsn, $user, $mdp;

        try{
            $mdlUser = new MdlUtilisateur();
            echo 'TEST';
            $mdlUser->connexion($_REQUEST['login'], $_REQUEST['mdp']);
        }
        catch (Exception $e){
            echo 'Erreur lors de la connexion' . $e . '<br>';
        }

    }

    /**
     * @throws Exception
     */
    public function accueil(){
        global $rep,$vues;

        $mdlListe = new MdlListe();
        $tabListes = $mdlListe->mdlFindAllListes();

        require ($rep.$vues['accueil']);
    }



    public function inscription(){
        global $rep, $vues, $con, $dVueErreur;
        try{

            $userGw = new UserGateway($con);
            $login = $_REQUEST["login"];
            $mdp = $_REQUEST["mdp"];
            $userGw->inscription($login, $mdp);
        }catch(Exception $e){
            $erreur = "Erreur lors de l'inscription" . $e;
            $dVueErreur[] = $erreur;
        }

    }

    public function ajouterTachePb(){
        global $dVueErreur;
        try{
            $nom = $_REQUEST["nom"];
            $desc = $_REQUEST["description"];
            $idListe = $_REQUEST["idListe"];
            if($nom && $desc) {
                $tache = new MdlTache();
                $tache->ajouterTache($nom, $desc, $idListe);
                echo 2;
            }
        }
        catch (Exception $e){
            $erreur = "Erreur lors de l'ajout d'une tache publique" . $e;
            $dVueErreur[] = $erreur;
        }

    }

    public function voirTachesListe(){
        global $vues, $idListe;

        $idListe = $_REQUEST['idListe'];

        require $vues["tachesListe"];
    }

    function voirListe(array $tabInfo, int ...$idListe){

    }


    public function reinit(){
        global $rep, $vues;
        require_once $vues['accueil'];
    }

    private function ajouterListePb()
    {
        global $dVueErreur;
        try{
            $nom = $_REQUEST["nom"];
            $desc = $_REQUEST["description"];
            if($nom && $desc) {
                $liste = new MdlListe();
                $liste->mdlAjouterListe($nom, $desc);
            }
        }
        catch (Exception $e){
            $erreur = "Erreur lors de l'ajout d'une tache publique" . $e;
            $dVueErreur[] = $erreur;
        }
    }
}