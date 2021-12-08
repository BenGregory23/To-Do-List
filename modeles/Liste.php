<?php

class Liste
{
    public function mdlFindAllListes(){
        global $dsn, $user, $mdp;
        $listeGw = new ListeGateway(new Connection($dsn, $user, $mdp));
        return $listeGw->findAllListes();
    }
}