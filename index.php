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


require 'config/config.php';
require 'DAL/TacheGateway.php';


require 'vues/accueil.php';



?>

</body>
</html>