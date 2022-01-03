<?php

class FrontController
{

    public function __construct(){
        global $vues;
        session_start();

        $listeActionAdmin = array("supprimerTachePb", "supprimerListePb", "supprimerUser", "Accueil");
        $listeActionUtilisateur = array("ajouterListePv", "ajouterTachePv", "supprimerTachePbPerso", "Accueil");
        $listeActionInvite = array("Inscription", "Connexion", "ajouterTachePb", "voirListePb", "S'inscrire", "validerInscription", "validerConnexion", "Accueil");


        $action = $_REQUEST['action'];
        if($action != NULL) $action = Nettoyage::nettoyer_string($action);

        if(in_array($action, $listeActionAdmin) == true){
            if(isset($_SESSION) && ($_SESSION['role'] == 'admin')){
                //connexion()
                //isAdmin()
            }
            else {
                require $vues['connexion'];
            }
        }

        else if(in_array($action, $listeActionUtilisateur)){

            if(isset($_SESSION) && ($_SESSION['role'] == 'user')){
                $mdlUser = new MdlUtilisateur();
                if($mdlUser->isUser()){

                    $ctrlUser = new ControleurUtilisateur($action);
                }

            }
            else {
                require $vues['connexion'];
            }
        }


        else {
                $ctrlInvit = new ControleurInvite($action);
        }
    }
}