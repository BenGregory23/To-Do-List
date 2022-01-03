<?php


class UserGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    /**
     * Fonction de recherche par ID d'un utilisateur
     * @param string $pseudo pseudo dont on veux l'ID
     * @param string $password password dont on veux l'ID
     * @throws Exception
     */
    public function rechercheID(string $pseudo, string $password): array
    {
        try{
            $query = 'SELECT ID FROM users WHERE (pseudo=:pseudo AND password=:password) ';

            $resBool=$this->con->executeQuery($query,array(
                ':pseudo'=>array($pseudo,PDO::PARAM_STR),
                ':password'=>array($password,PDO::PARAM_STR) ));

            return $result=$this->con->getResults();

        }catch (PDOException $e){
            throw new Exception('Problème lors de recherche d\'un utilisateur ! <br>  Exception : '.$e);
        }
    }

    /**
     * Fonction getter du password
     * @param string $pseudo pseudo dont on veut le password
     * @throws Exception
     */
    public function getPassword(string $pseudo): array
    {
        try{
            $query ='SELECT password FROM users WHERE pseudo=:pseudo';

            $resBool=$this->con->executeQuery($query,array(
                ':pseudo'=>array($pseudo,PDO::PARAM_STR)));

            return $result=$this->con->getResults();
        }catch (PDOException $e){
            throw new Exception('Problème lors de recherche d\'un utilisateur !\</br>Exception : '.$e);

        }
    }

    /**
     * @throws Exception
     */
    public function getLogin(string $pseudo): array
    {
        try{
            $query ='SELECT pseudo FROM users WHERE pseudo=:pseudo';

            $resBool=$this->con->executeQuery($query,array(
                ':pseudo'=>array($pseudo,PDO::PARAM_STR)));

            return $result=$this->con->getResults();

        }catch (PDOException $e){
            throw new Exception('Problème lors de recherche d\'un utilisateur !\</br>Exception : '.$e);

        }
    }

    /**
     * Fonction d'inscription d'un nouvel utilisateur
     * @param string $pseudo Pseudo de la personne à inscrire
     * @param string $password Password de la personne à inscrire
     * @throws Exception
     */
    public function inscription(string $pseudo, string $password){
        try{
            $this->getLogin($pseudo);
            if($pseudo){
                $_REQUEST['login'] = "Login déjà existant";
            }
            else{
                $query = 'INSERT INTO users VALUES (NULL, :pseudo, :password)';

                $resBool=$this->con->executeQuery($query,array(
                    ':pseudo'=>array($pseudo,PDO::PARAM_STR),
                    ':password'=>array($password,PDO::PARAM_STR) ));
            }

        }catch (PDOException $e){
            throw new Exception('Problème lors de l\'insertion d\'un utilisateur !  <br> Exception : '.$e);
        }
    }
}
