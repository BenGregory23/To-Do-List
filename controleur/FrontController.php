<?php

class FrontController
{

    public function __construct(){
        global $vues;
        session_start();

        $listeActionAdmin = array("supprimerTachePb", "supprimerListePb", "supprimerUser");
        if(in_array($action, $listeActionAdmin) == true){
            if(isset($_SESSION) && ($_SESSION['role'] == 'admin')){
                //connexion()
                //isAdmin()
            }
        }



        $listeActionUtilisateur = array("ajouterListePv", "ajouterTachePv", "");
        if(in_array($action, $listeActionUtilisateur)){

            else{
                require $vues['accueil']; //remplacer accueil par connexion des que possible
            }
        }
    }
}