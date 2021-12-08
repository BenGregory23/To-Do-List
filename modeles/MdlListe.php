<?php

class MdlListe
{
    public function mdlFindAllListes(){
        global $dsn, $user, $mdp;
        $listeGw = new ListeGateway(new Connection($dsn, $user, $mdp));
        return $listeGw->findAllListes();
    }


    public function mdlAjouterListe($nom, $description,$pseudo){
        global $dsn, $user, $mdp;
        try{
            $listeGw = new ListeGateway(new Connection($dsn, $user,$mdp));
            $listeGw->ajouterListe($nom, $description, $pseudo);
        }
        catch (Exception $e){
            echo $e;
        }
    }

    public function mdlAjouterListePv($nom, $description, $pseudo){
        global $dsn, $user, $mdp;
        try{
            $listeGw = new ListeGateway(new Connection($dsn, $user,$mdp));
            $listeGw->ajouterListePv($nom, $description, $pseudo);
        }
        catch (Exception $e){
            echo $e;
        }
    }

    public function mdlSupprimerListe($id){
        global $dsn, $user, $mdp;
        try{
            $listeGw = new ListeGateway(new Connection($dsn, $user,$mdp));
            $listeGw->supprimerListe($id);
        }
        catch (Exception $e){
            echo $e;
        }
    }


}