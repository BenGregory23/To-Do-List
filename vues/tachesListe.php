
<html>
<head>
    <title>Taches</title>
    <link rel="stylesheet" href="../Styles/accueil.css">
</head>
<body>


<form method="post" name="ajout-tache-pub" id="formTPub" align="center">
    <label>Nom</label>
    <label>
        <input name="nom" value="">
    </label>
    <label>Description</label>
    <label>
        <input name="description" value="">
    </label>
    <input type="submit"  name="action" value="?action=ajouterTachePb&idListe=<?php global $idListe; echo $idListe; ?>"" id="form-submit"/>
</form>
<?php


try{
    global $idListe;
    $mdlTache = new MdlTache();
    $tabTaches = $mdlTache->voirTaches($idListe);

    foreach ($tabTaches as $row){
        echo $row['nom'] . '<br>';
    }
}
catch (Exception $e){
    echo $e;
}



?>


<!--faire en sorte de valider le formulaire et envoyer l'action au controleur-->
</body>
</html>
