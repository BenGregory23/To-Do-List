<?php

class MdlTache
{
    public int $id; //la base de donnée doit avoir un auto increment pour l'id
    public string $nom;
    public string $description;
    public EnumEtat $etat;

    public function voirTaches($idListe){
        global $dsn, $user, $mdp;
        try{
            $tacheGw = new TacheGateway(new Connection($dsn, $user,$mdp));
            $MdltabTache = $tacheGw->findTache($idListe);
        }
        catch (Exception $e){
            echo $e;
        }

        return $MdltabTache;

    }

    public function ajouterTache($nom, $description, $idListe){
        global $dsn, $user, $mdp;
        try{
            $tacheGw = new TacheGateway(new Connection($dsn, $user,$mdp));
            $tacheGw->ajouterTache($nom, $description, $idListe);
        }
        catch(Exception $e){
            echo $e;
        }
    }


    //Fonction permettant de supprimer une tâche si on connaît son ID
    public function supprimerTache($id){
        global $dsn, $user, $mdp;
        try{
            $tacheGw =  new TacheGateway(new Connection($dsn, $user,$mdp));
            $tacheGw->supprimerTache($id);
        }
        catch(Exception $e){
            echo $e;
        }

    }




}