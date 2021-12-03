<?php
require 'Connection.php';

$database['login']= "ZartaXO3";
$database['password']= "Panda567&";
$database['name']= "todolist";

$dsn = 'mysql:host=localhost;dbname=toDoList';
$user = "ZartaX0O3";
$mdp = "Panda567&";

try{
    $con = new Connection($dsn, $user, $mdp);
}
catch(PDOException $e){
    echo $e;
}



$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/pageAccueil.php";
$vues['erreur']= "vues/Connexion.php";
$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/erreur.php";
$vues['erreur']= "vues/erreur.php";
