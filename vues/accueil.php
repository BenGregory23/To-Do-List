<html>
<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="../Styles/accueil.css">
</head>
<body>


<nav>

    <div class="boutons">
        <?php
        if(!isset($_SESSION))
            echo '  
                    <form method="post">
                        <input type="submit"  name="action" value="Connexion"/>
                    </form>';
        ?>



        <form method="post">
            <input type="submit" name="action" value="Inscription"/>
        </form>

    </div>
    <div class="titre">
        <h1>TO DO LISTE</h1>
    </div>

    <div>
        <form method="post">
            <input type="button" name="action" value="Accueil">
        </form>
    </div>


</nav>
<h2>Accueil</h2>

<?php


try{
        $liste = new MdlListe();
        $tabListes = $liste->mdlFindAllListes();

        foreach ($tabListes as $row){
            $nomListe = $row['nom'];
            echo '<form method="post" name="ajout-tache-pub" id="formTPub" align="center">
                        <input value= ' . $row['nom'] .  ' class="liste"  type="submit"  id="form-submit">
                <input type="hidden" name="action" value="voirListePb"/>
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
