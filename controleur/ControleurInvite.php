<?php

class ControleurInvite
{
    public function __construct($action){

        global $rep, $vues;
        $dVueErreur = array();

        $listeAction = array('ajouterTachePb', 'ajouterListe', 'voirListePb');
        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case 'Accueil':
                case NULL :
                    $this->reinit();
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

                case 'voirListePb':
                    $this->voirTachesListe();
                    break;
                case 'ajouterListe' :
                    break;
                default :
                    echo 'DEFAULT';
            }
        }
        catch(Exception $e){
            echo $e;
        }
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
            //$idListe = $_REQUEST["idListe"];
            $idListe = 1;
            if($nom && $desc) {
                $tache = new MdlTache();
                $tache->ajouterTache($nom, $desc, $idListe);
            }
        }
        catch (Exception $e){
            $erreur = "Erreur lors de l'ajout d'une tache publique" . $e;
            $dVueErreur[] = $erreur;
        }

    }

    public function voirTachesListe(){
        global $vues;
        require $vues['tachesListe'];
    }

    public function reinit(){
        global $rep, $vues;
        echo 'BITE';
        require $vues['accueil'];
    }

}