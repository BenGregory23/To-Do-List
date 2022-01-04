<?php
require 'Connection.php';

$dsn = 'mysql:host=localhost;dbname=toDoList';
$user = "ben";
$mdp = "choco2323";
$idLogin['login'] = 0;
$tabListes = NULL;

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

