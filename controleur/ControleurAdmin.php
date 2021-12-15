<?php

class ControleurAdmin
{
    public function __construct($action){
        global $rep, $vues;
        $dVueErreur = array();

        $listeAction = array("supprimerTachePb", "supprimerListePb", "supprimerUser");
        try{
            $action = $_REQUEST['action'];
            switch ($action){
                case NULL :
                    $this->reinit();
                    break;
                case 'supprimerTachePb' :
                    $this->supprimerTachePb();
                    break;
                case 'supprimerListePb' :
                    $this->supprimerListePb();
                    break;
                case 'supprimerUser' :
                    $this->supprimerUser();
                    break;
                default:
                    echo 'DEFAULT CASE';
                    break;
            }
        }
        catch (Exception $e){
            echo $e;
        }
    }

    public function reinit(){
        global $rep, $vues;
        require ($vues['accueil']);
    }

    public function supprimerTachePb(){
        //faire code suppression
    }

    public function supprimerListePb(){
        //faire code suppression Liste
    }

    public function supprimerUser(){
        //faire code suppression user
    }
}