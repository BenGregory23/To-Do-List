<?php

class TacheGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function insert($id, $nom, $description, $etat){
        $query = "INSERT INTO tache VALUES(:id, :nom, :description, :etat)";
        $this->con->executeQuery($query, array(
            ':id'=>array($id, PDO::PARAM_INT),
            ':nom'=> array($nom, PDO::PARAM_STR),
            ':description'=>array($description, PDO::PARAM_STR),
            ':etat'=>array($etat)));
    }

    public function update($id, $nom, $description, $etat){
        //code update
    }

    public function delete($id, $nom, $description, $etat){
        //code delete
    }

    public function FindByName($nom){

        if($nom <> 0){
            $query = 'SELECT * FROM tache WHERE nom=:nom';
            $this->con->executeQuery($query, array(':nom'=> array($nom, PDO::PARAM_STR)));
        }

        var_dump($this->con->errorInfo());
        var_dump($this->con->errorCode());
        $results =$this->con->getResults();


        echo 'wow';
        foreach ($results as $row){
            $Tab_de_taches[]=new Tache($row['id'], $row['nom'], $row['description'], $row['etat']);
        }
        return $Tab_de_taches;
    }
}