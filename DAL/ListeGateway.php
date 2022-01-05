<?php

class ListeGateway
{
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    /**
     * @throws Exception
     */
    public function findListe_idListe(int $idListe): array
    {
        try{
            $query = 'SELECT * FROM listes WHERE ID= :id';
            $this->con->executeQuery($query, array(
                ':idListe'=>array($idListe, PDO::PARAM_STR)
            ));

            return $this->con->getResults();
        }
        catch(Exception $e){
            throw new Exception('Problème lors de recherche d\'une liste! </br> Exception : '. $e);
        }
    }

    /**
     * @throws Exception
     */
    public function findAllListes(): array
    {
        try{
            $query = 'SELECT * FROM listes';
            $this->con->executeQuery($query);
            return $this->con->getResults();
        }
        catch(Exception $e){
            throw new Exception("Erreur lors de la récupération des listes ! <br>" . $e);
        }
    }


    /**
     * @throws Exception
     */
    public function ajouterListe($nom, $description, $pseudo, $isPublic){
        try{
            $query = 'INSERT INTO listes VALUES(NULL, :nom, :description, :pseudo, :isPublic)';
            $this->con->executeQuery($query, array(
               ':nom'=>array($nom, PDO::PARAM_STR),
                ':description'=>array($description, PDO::PARAM_STR),
                ':pseudo'=>array($pseudo, PDO::PARAM_STR),
                ':isPublic'=>array($isPublic, PDO::PARAM_STR),
            ));
        }
        catch (Exception $e){
            throw new Exception("Erreur lors de  l'ajout d'une liste ! <br>" . $e);
        }
    }

    /**
     * @throws Exception
     */
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

    /**
     * @throws Exception
     */
    public function recupere_liste_par_bloc(int $debut, int $nbListes){

        try {
            $query = 'SELECT * FROM listes WHERE isPublic=TRUE ORDER BY ID ASC LIMIT :debut,:nbListes';

            $this->con->executeQuery($query,array(
                ':debut'=>array($debut,PDO::PARAM_INT),
                ':nbListes'=>array($nbListes,PDO::PARAM_INT)
            ));

            return $this->con->getResults();
        }catch (PDOException $e){
            throw new Exception('Problème lors de la récupération de plusieurs listes !</br>Exception : '.$e);
        }
    }

    /**
     * @throws Exception
     */
    public function nbListesPublique(){

        try {
            $query = 'SELECT COUNT(*) FROM listes WHERE isPublic=true';

            $this->con->executeQuery($query,array());

            return $this->con->getResults();
        }catch (PDOException $e){
            throw new Exception('Problème lors de la récupération de plusieurs listes !</br>Exception : '.$e);
        }
    }



}