<?php
require 'Connection.php';

$database['login']= "Benchoco";
$database['password']= "makougoum";
$database['name']= "todolist";

$dsn = 'mysql:host=localhost;dbname=toDoList';
$user = "Benchoco";
$mdp = "makougoum";

try{
    $con = new Connection($dsn, $user, $mdp);
}
catch(PDOException $e){
    echo $e;
}


$vues['accueil']= "../vues/accueil.php";
$vues['connexion']= "vues/Connexion.php";
$vues['erreur']= "vues/erreur.php";

