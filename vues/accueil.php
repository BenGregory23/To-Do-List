<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="../Styles/accueil.css">
</head>
<body>


<nav>

    <div class="boutons">
        <form>
            <button type="submit"  name="action" value="Connexion" > Se Connecter</button>
        </form>


        <form>
            <button type="submit" name="action" value="Inscription">S'inscrire</button>
        </form>

    </div>
    <div class="titre">
        <h1>TO DO LISTE</h1>
    </div>
    <div class="boutons1">
        <button type="submit"  > Se Connecter</button>
        <button>S'inscrire</button>
    </div>


</nav>
<h2>Accueil</h2>
<form method="post" name="ajout-tache-pub" id="formTPub" align="center">
    <label>Nom</label>
    <label>
        <input name="nom" value="">
    </label>
    <label>Description</label>
    <label>
        <input name="description" value="">
    </label>
    <input type="submit"  name="action" value="ajouterTache" id="form-submit" align="center"/>
</form>
<?php


try{
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
