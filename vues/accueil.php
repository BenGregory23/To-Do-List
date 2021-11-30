<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="../Styles/accueil.css">
</head>
<body>
<h2 align="center">Accueil</h2>
<form method="post" name="ajout-tache-pub" id="formTPub" align="center"  action="../controleur/test.php">
    <label>Nom</label>
    <input name="nom" value="">
    <label>Description</label>
    <input name="description" value="">
    <input type="submit" value="Envoyer"/>
</form>
<?php


try{
    $query = "SELECT * FROM tache";

    $con->executeQuery($query);
    $results = $con->getResults();

    foreach($results as $value){
        echo '<div class="tache">' . '<input type="checkbox"> ' . '<label>'  . $value['nom'] . " - ETAT :  " . $value['etat']  .'</div>' . '<br>';
    }


    /*
    echo 'test';
    foreach ($Tab_de_taches as $row){
        echo $row['nom'] . '<br>';
    }
    */
}
catch (Exception $e){
    echo $e;
}


?>


<!--faire en sorte de valider le formulaire et envoyer l'action au controleur-->
</body>
</html>
