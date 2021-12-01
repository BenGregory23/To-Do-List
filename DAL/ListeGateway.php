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
}