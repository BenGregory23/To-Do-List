

<html>
<head>
    <link rel="stylesheet" href="../Styles/connexion.css"
</head>
<body>
<div>
    <form method="get">
        <button type="submit" name="action" value="Accueil" id="btn-home">Home</button>
    </form>

</div>
<div class="div-connexion">

    <h2>Connexion</h2>
    <form method="post" name="ajout-utilisateur" >
        <label>Nom d'utilisateur</label>
        <input type="text" name="login">
        <label> Mot de passe</label>
        <input type="password" name="mdp">
        <input type="submit" value="Se connecter"/>
        <input type="hidden" name="action" value="validerConnexion"/>
    </form>
</div>
</body>
</html>
