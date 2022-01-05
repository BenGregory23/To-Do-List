<?php

class ControleurInvite
{
    public function __construct($action)
    {

        global $rep, $vues;
        $dVueErreur = array();

        try {
            switch ($action) {

                case 'Accueil':
                case NULL :
                    $this->accueil();
                    break;

                case 'Inscription' :
                    $this->showInscription();
                    break;

                case "validerInscription" :
                    $this->inscription();
                    break;

                case 'Connexion' :
                    $this->showConnexion();
                    break;

                case 'validerConnexion' :
                    $this->connexion();
                    break;

                case 'ajouterTache' :
                    $this->ajouterTache();
                    break;

                case 'ajouterListe' :
                    $this->ajouterListe();
                    break;

                case 'voirListePb':
                    $this->voirTachesListe();
                    break;

                default :
                    require($rep . $vues['accueil']);
                    break;

            }
        } catch (Exception $e) {
            $dVueErreur[] = "Error not expected";
            require($rep . $vues['accueil']);
        }
        exit(0);
    }

    /**
     * @throws Exception
     */
    public function accueil()
    {
        global $rep, $vues;

        $mdlListe = new MdlListe();
        $tabListes = $mdlListe->mdlFindAllListes();

        require($rep . $vues['accueil']);
    }

    public function showInscription()
    {
        global $vues;

        try {
            require $vues["inscription"];
        } catch (Exception $e) {
            $erreur = "Erreur lors de l'affichage du formulaire d'inscription" . $e;
            $dVueErreur[] = $erreur;
        }
    }

    public function inscription()
    {
        global $rep, $vues, $con, $dVueErreur;
        try {

            $userGw = new UserGateway($con);
            $userGw->inscription($_REQUEST["login"], $_REQUEST["mdp"]);
            require $vues['accueil'];
        } catch (Exception $e) {
            $erreur = "Erreur lors de l'inscription" . $e;
            $dVueErreur[] = $erreur;
        }

    }

    public function showConnexion()
    {
        global $vues;

        try {
            require $vues['connexion'];
        } catch (Exception $e) {
            $erreur = "Erreur lors de l'affichage du formulaire de connexion" . $e;
            $dVueErreur[] = $erreur;
        }
    }

    public function connexion()
    {
        global $rep, $vues, $dsn, $user, $mdp;

        try {
            $mdlUser = new MdlUtilisateur();
            $mdlUser->connexion($_REQUEST['login'], $_REQUEST['mdp']);
            require $vues["accueil"];
        } catch (Exception $e) {
            echo 'Erreur lors de la connexion' . $e . '<br>';
        }

    }

    public function ajouterTache()
    {
        global $dVueErreur;
        try {
            $nom = $_REQUEST["nom"];
            $desc = $_REQUEST["description"];
            $idListe = $_REQUEST["idListe"];
            if ($nom && $desc) {
                $tache = new MdlTache();
                $tache->ajouterTache($nom, $desc, $idListe);
            }
        } catch (Exception $e) {
            $erreur = "Erreur lors de l'ajout d'une tache publique" . $e;
            $dVueErreur[] = $erreur;
        }

    }

    private function ajouterListe()
    {
        global $dVueErreur;
        try {
            $nom = $_REQUEST["nom"];
            $desc = $_REQUEST["description"];

            if (isset( $_REQUEST["isPublic"])) $public = 1;
            else $public = 0;

            if($_SESSION['login'] != "") $user = $_SESSION['login'];
            else $user = "Invité";

            if ($nom && $desc) {
                $liste = new MdlListe();
                $liste->mdlAjouterListe($nom, $desc, $public, $user);
            }
        } catch (Exception $e) {
            $erreur = "Erreur lors de l'ajout d'une tache publique" . $e;
            $dVueErreur[] = $erreur;
        }
    }

    public function voirTachesListe()
    {
        global $vues, $idListe;

        $idListe = $_REQUEST['idListe'];

        require $vues["tachesListe"];
    }

    function voirListe(array $tabInfo, int ...$idListe)
    {

    }

    public function reinit()
    {
        global $rep, $vues;
        require_once $vues['accueil'];
    }
}