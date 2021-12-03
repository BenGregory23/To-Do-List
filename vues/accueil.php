<html lang="fr">
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="/Styles/accueil.css">
</head>
<body>
<h2 align="center">Accueil</h2>
<form method="post" name="ajout-tache-pub" id="formTPub" align="center">
    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nom = $_POST["nom"];
            $desc = $_POST["description"];
            if($nom && $desc){
                $gateaway = new TacheGateway($con);
                $gateaway->insert($nom, $desc);
            }
        }
    ?>
    <label>Nom</label>
    <input name="nom" value="">
    <label>Description</label>
    <input name="description" value="">
    <input type="submit" value="Envoyer"/>
</form>



<!--faire en sorte de valider le formulaire et envoyer l'action au controleur-->
</body>
</html>
