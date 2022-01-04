<?php

class Validation
{

    static function val_action($action){
        if(!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function validation_formulaire(string &$nom, string &$description, array &$dVueErreur){

        if(!isset($nom) || $nom==""){
            $dVueErreur[] = "pas de nom";
            $nom = "";
        }
        if(!isset($description) || $description=""){
            $dVueErreur[] = "pas de description";
            $description = "";
        }
    }


}