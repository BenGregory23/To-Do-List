<?php



class ControleurUtilisateur
{
    public function __construct(){

        global $rep, $vues;
        $dVueErreur = array();

        $listeAction = array('ajouterTache', 'ajouterListe', 'ajouterTachePv', 'supprimerTachePv', 'ajouterListePv', 'supprimerListePv');
        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL :
                    $this->reinit();
                    break;
                case 'ajouterTache' :
                    $nom = $_REQUEST["nom"];
                    $desc = $_REQUEST["description"];
                    $idListe = 1; //POUR LE MOMENT TOUS VAS DANS LA LISTE 1
                    if($nom && $desc){
                        $tache = new Tache();
                        $tache->ajouterTache($nom, $desc, $idListe);
                    }
                    $this->reinit();

                    echo 'CA MARCHE';
                    break;
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
        echo'TEST';
    }
}