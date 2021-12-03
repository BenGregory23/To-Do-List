<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="../Styles/accueil.css">
</head>
<body>


<nav>

    <div class="boutons">
        <button>Se Connecter</button>
        <button>S'inscrire</button>
    </div>

</nav>
<h2 align="center">Accueil</h2>
<form method="post" name="ajout-tache-pub" id="formTPub" align="center">
    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom = $_POST["nom"];
            $desc = $_POST["description"];
            if($nom && $desc){
                $tacheGw = new TacheGateway($con);
                $tacheGw->ajouterTache($nom, $desc, 1);
            }
        }
    ?>
    <label>Nom</label>
    <input name="nom" value="">
    <label>Description</label>
    <input name="description" value="">
    <input type="submit"  name="action" value="ajouterTache"/>
</form>
<?php


try{
    $query = "SELECT * FROM tache";

    $con->executeQuery($query);
    $results = $con->getResults();

    foreach($results as $value){
        echo '<div class="tache">' . '<input type="checkbox"> ' . '<label>'  . $value['nom'] . " - ETAT :  " . $value['etat']  .'</div>' . '<br>';
    }

}
catch (Exception $e){
    echo $e;
}


?>


<!--faire en sorte de valider le formulaire et envoyer l'action au controleur-->
</body>
</html>
