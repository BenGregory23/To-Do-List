<?php

class MdlTache
{
    public string $nom;

    public function voirTaches($idListe): array
    {
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