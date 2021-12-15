<?php

class FrontController
{

    public function __construct(){
        global $vues;
        session_start();

        if($action == "afficherPageInscription"){
            require 'vues/Inscription.php';
        }


        $listeActionAdmin = array("supprimerTachePb", "supprimerListePb", "supprimerUser");
        if(in_array($action, $listeActionAdmin) == true){
            if(isset($_SESSION) && ($_SESSION['role'] == 'admin')){
                //connexion()
                //isAdmin()
            }
            else {
                //Require page connexion
            }
        }



        $listeActionUtilisateur = array("ajouterListePv", "ajouterTachePv", "");
        if(in_array($action, $listeActionUtilisateur)){
            if(isset($_SESSION) && ($_SESSION['role'] == 'user')){
                //connexion()

            }
            else {
                //Require page connexion
            }
        }

        $listeActionInvite = array("Inscription");
    }
}