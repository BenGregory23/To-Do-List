<?php

class TacheGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    /**
     * @throws Exception
     */
    public function findTache($idListe): array
    {
        try{
            $query = "SELECT * FROM tache WHERE idListe = :idListe";
            $this->con->executeQuery($query, array(
                ':idListe'=>array($idListe, PDO::PARAM_INT)
            ));



            $results = $this->con->getResults();
        }
        catch (PDOException $e){
            throw new Exception('Problème lors de la récuparation des tâches !<br> Exception : '. $e);
        }
            return  $results;


    }

    /**
     * @throws Exception
     */
    public function ajouterTache($nom, $description, $idListe){
        try{
            $query = "INSERT INTO tache VALUES(NULL, :nom, :description, 'A Faire', :idListe)";
            $this->con->executeQuery($query, array(
                ':nom'=> array($nom, PDO::PARAM_STR),
                ':description'=>array($description, PDO::PARAM_STR),
                ':idListe'=>array($idListe, PDO::PARAM_STR)));
        }
        catch(PDOException $e){
            throw new Exception('Problème lors de l\'insertion d\'une tache. <br> Exception : '.$e);
        }

    }

    //Permet de supprimer toute les tâches ayant l'idListe donné en paramètre

    /**
     * @throws Exception
     */
    public function supprimerTachesIdListe(int $idListe){
        try{
            $query = 'DELETE FROM tache WHERE ID = :idListe';
            $this->con->executeQuery($query, array(
                ':idListe'=> array($idListe, PDO::PARAM_INT)
            ));
        }
        catch (PDOException $e){
            throw new Exception('Problème lors de la suppresion de taches ! <br>Exception : '.$e);
        }
    }

    //Permet de supprimer une tâche spécifique

    /**
     * @throws Exception
     */
    public function supprimerTache(int $idTache){
        try{
            $query = 'DELETE FROM tache WHERE id = :id';
            $this->con->executeQuery($query, array(
               ':id'=>array($idTache, PDO::PARAM_INT)
            ));
        }
        catch(PDOException $e){
            throw new Exception('Problème de la suppression d\'une tâche ! <br>Exception : ' .$e);
        }
    }
}
