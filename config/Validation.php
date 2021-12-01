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
        if($nom != filter_var($nom, FILTER_SANITIZE_STRING)){
            $dVueErreur[] = "tentative d'injection de code";
            $nom = "";
        }

        if(!isset($description) || $description=""){
            $dVueErreur[] = "pas de description";
            $description = "";
        }

        if($description != filter_var($description, FILTER_SANITIZE_STRING)){
            $dVueErreur[] = "tentative d'injection de code";
        }
        else{
            require '../vues/accueil.php';
        }
    }


}