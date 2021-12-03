<?php

class Validation
{

    static function val_action($action){
        if(!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_form(string $nom, string $description){

        if(!isset($nom)||$nom==""){
            $dVueErreur[] = "pas de nom";
            $nom = "";
        }
        if(!isset($description) || $description=""){
            $dVueErreur[] = "pas de description";
            $description = "";
        }
        else{
            require '../vues/accueil.php';
        }
    }


}