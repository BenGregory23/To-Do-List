<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="../Styles/accueil.css">
</head>
<body>


<nav>

    <div class="boutons">
        <button type="submit"  > Se Connecter</button>
        <button>S'inscrire</button>
    </div>
    <div class="titre">
        <h1>TO DO LISTE</h1>
    </div>
    <div class="boutons1">
        <button type="submit"  > Se Connecter</button>
        <button>S'inscrire</button>
    </div>


</nav>
<h2 align="center">Accueil</h2>
<form method="post" name="ajout-tache-pub" id="formTPub" align="center">
    <label>Nom</label>
    <input name="nom" value="">
    <label>Description</label>
    <input name="description" value="">
    <input type="submit"  name="action" value="ajouterTache" id="form-submit" align="center"/>
</form>
<?php


try{
    /*
        $tache = new MdlTache();
        $tabTaches = $tache->voirTaches(1);


        foreach($tabTaches as $value){
            echo '<div class="tache">' . '<input type="checkbox"> ' . '<label>'  . $value["nom"] . " - ETAT :  " . $value["etat"]  .'</div>' . '<br>';

        }
    */


        $liste = new MdlListe();
        $tabListes = $liste->mdlFindAllListes();

        foreach ($tabListes as $row){
            echo '
            <form method="post" name="ajout-tache-pub" id="formTPub" align="center">

                <input class="liste"type="submit"  name="action" value="voirTacheListe" id="form-submit" align="center"/>
            </form>';
        }
}
catch (Exception $e){
    echo $e;
}



?>


<!--faire en sorte de valider le formulaire et envoyer l'action au controleur-->
</body>
</html>
