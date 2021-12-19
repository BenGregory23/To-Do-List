<?php
require 'Connection.php';

$database['login']= "ben";
$database['password']= "choco2323";
$database['name']= "todolist";

$dsn = 'mysql:host=localhost;dbname=toDoList';
$user = "ben";
$mdp = "Choco2323";

//ben Choco2323

try{
    $con = new Connection($dsn, $user, $mdp);
}
catch(PDOException $e){
    echo $e;
}

$dVueErreur = array();

$vues['accueil']= "vues/accueil.php";
$vues['tachesListe'] = "vues/tachesListe.php";
$vues['connexion']= "vues/connexion.php";
$vues['inscription'] = "vues/Inscription.php";
$vues['erreur']= "vues/erreur.php";

