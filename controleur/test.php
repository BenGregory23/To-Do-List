<?php

require  'Validation.php';

Validation::val_form($_POST["nom"], $_POST["description"]);

if(isset($dVueErreur)){
    foreach ($dVueErreur as $row){
        echo $row;
    }
}

$query = 'INSERT INTO tache VALUES(5, :nom, :description, "A Faire")';

$con->executeQuery($query, array(':nom'=>array($_POST['nom'], PDO::PARAM_STR),
                                 ':description'=>array($_POST['description'], PDO::PARAM_STR)));
