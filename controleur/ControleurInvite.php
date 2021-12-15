<?php

class ControleurInvite
{
    public function __construct($action){

        global $rep, $vues;
        $dVueErreur = array();

        $listeAction = array('ajouterTache', 'ajouterListe');
        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL :
                    $this->reinit();
                    break;
                case 'ajouterTache' :
                    $nom = $_REQUEST["nom"];
                    $desc = $_REQUEST["description"];
                    $idListe = $_REQUEST["idListe"];
                    if($nom && $desc){
                        $tache = new Tache($nom, $desc, $idListe, $_SESSION["pseudo"]);
                        $tache->ajouterTache();
                    }
                    $this->reinit();
                    break;

                case 'ajouterListe' :

                default :
                    echo 'DEFAULT';
            }
        }
        catch(Exception $e){
            echo $e;
        }
    }



    public function reinit(){
        global $rep, $vues;
        require ($vues['accueil']);
    }

}