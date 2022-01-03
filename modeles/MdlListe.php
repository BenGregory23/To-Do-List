<?php

class MdlListe
{
    /**
     * @throws Exception
     */
    public function mdlFindAllListes(): array
    {
        global $dsn, $user, $mdp;
        echo 3;
        $listeGw = new ListeGateway(new Connection($dsn, $user, $mdp));
        return $listeGw->findAllListes();
    }


    public function mdlAjouterListe($nom, $description){
        global $dsn, $user, $mdp;
        try{
            echo 1;
            $listeGw = new ListeGateway(new Connection($dsn, $user,$mdp));
            $listeGw->ajouterListe($nom, $description, "Public");
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
            $listeGw = new ListeGateway();
            $listeGw->supprimerListe($id);
        }
        catch (Exception $e){
            echo $e;
        }
    }

    /**
     * @throws Exception
     */
    public function recupere_liste_par_bloc(int $debut, int $nbListes): array
    {
        global $dsn, $user, $mdp;

        $lG = new ListeGateway(new Connection($dsn, $user,$mdp));

        $listes_res = $lG->recupere_liste_par_bloc(($debut-1)*$nbListes,$nbListes);

        if (empty($listes_res)){
            return array();
        }
        $tabListes = array();
        foreach ($listes_res as $liste){
            $tabListes[] = new Liste($liste["nom"], $liste["description"], $liste["isPublic"], $liste["pseudo"]);
        }

        return $tabListes;

    }

    public function nbPagesMax($nbListes): int
    {
        global $base,$login,$mdpbase;

        $lG = new ListeGateway(new Connection($base,$login,$mdpbase));

        $nbListesPublique = $lG->nbListesPublique();

        return (int)($nbListesPublique[0][0]/$nbListes);
    }



}