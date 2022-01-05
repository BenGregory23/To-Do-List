<?php

class FrontController
{

    public function __construct(){
        global $vues;
        session_start();
        $action = NULL;

        $listeActionUtilisateur = array("ajouterListePv", "ajouterListePb","ajouterTachePv", "supprimerTachePbPerso", "Deconnexion");
        $listeActionInvite = array("Inscription", "Connexion", "ajouterTachePb", "ajouterListePb", "voirListePb", "S'inscrire", "validerInscription", "validerConnexion", "Accueil");

        try{
            if (isset($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            }

            if($action != NULL) $action = Nettoyage::nettoyer_string($action);

            if(in_array($action, $listeActionUtilisateur) != NULL){

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
                new ControleurInvite($action);
            }
        } catch (Exception $e){
            $dVueErreur[]="Erreur inattendue";
            require ($vues['accueil']);
        }
    }
} 