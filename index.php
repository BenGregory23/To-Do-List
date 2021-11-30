<!DOCTYPE html>
<html lang="fr">
<head>
    <title>ToDo List Application PHP and MySQL</title>
</head>
<body>



<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
//ce fichier doit faire appel au controlleur


require('config/Connection.php');
require('modeles/TacheGateway.php');

$dsn = 'mysql:host=localhost;dbname=toDoList';
$user = "ZartaX0O3";
$mdp = "Panda567&";



try{
    $con = new Connection($dsn, $user, $mdp);
    require 'vues/accueil.php';
}
catch(Exception $e){
    echo $e;
}

?>

</body>
</html>