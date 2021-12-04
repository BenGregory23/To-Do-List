<?php
require 'Connection.php';

$database['login']= "ben";
$database['password']= "Choco2323";
$database['name']= "todolist";

$dsn = 'mysql:host=localhost;dbname=toDoList';
$user = "ben";
$mdp = "Choco2323";

try{
    $con = new Connection($dsn, $user, $mdp);
}
catch(PDOException $e){
    echo $e;
}


$vues['accueil']= "../vues/accueil.php";
$vues['connexion']= "vues/Connexion.php";
$vues['erreur']= "vues/erreur.php";

