<?php

class ListeGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function findListe_idListe(int $idListe){
        try{
            $query = 'SELECT * FROM listes WHERE ID= :id';
            $this->con->executeQuery($query, array(
                ':idListe'=>array($idListe, PDO::PARAM_STR)
            ));

            return $result = $this->con->getResults();
        }
        catch(Exception $e){
            throw new Exception('Problème lors de recherche d\'une liste! </br> Exception : '. $e);
        }
    }

    public function findAllListes(){
        try{
            $query = 'SELECT * FROM listes';
            $this->con->executeQuery($query);
            $results = $this->con->getResults();
            return $results;
        }
        catch(Exception $e){
            throw new Exception("Erreur lors de la récupération des listes ! <br>" . $e);
        }
    }


    public function ajouterListes($nom, $description, $pseudo){
        try{
            $query = 'INSERT INTO lites VALUES(:nom, :description, "Visiteur", TRUE )';
            $this->con->executeQuery($query, array(
               ':nom'=>array($nom, PDO::PARAM_STR),
                ':description'=>array($description, PDO::PARAM_STR)
            ));
        }
        catch (Exception $e){
            throw new Exception("Erreur lors de  l'ajout d'une liste ! <br>" . $e);
        }
    }

    public function ajouterListesPv($nom, $description, $pseudo){
        try{
            $query = 'INSERT INTO lites VALUES(:nom, :description, :pseudo, FALSE )';
            $this->con->executeQuery($query, array(
                ':nom'=>array($nom, PDO::PARAM_STR),
                ':description'=>array($description, PDO::PARAM_STR),
                ':pseudo'=>array($pseudo, PDO::PARAM_STR)
            ));
        }
        catch (Exception $e){
            throw new Exception("Erreur lors de  l'ajout d'une liste privée ! <br>" . $e);
        }
    }

    public function supprimerListe($id){
        try{
            $query = 'DELETE FROM listes  WHERE ID = :id';
            $this->con->executeQuery($query, array(
               ':id'=>array($id, PDO::PARAM_INT)
            ));
        }
        catch (Exception $e){
            throw new Exception("Erreur lors de la suppression d'une liste <br> " . $e );
        }
    }

}