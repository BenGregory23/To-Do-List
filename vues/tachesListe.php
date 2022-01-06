<html lang="en">
<head>
    <title>Acceuil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/accueil.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#modalErreur').modal('show');
        });
    </script>
</head>
<body style="background-image: url("
")" >
<nav class="p-1 navbar-dark bg-dark sticky-top">
    <div class="d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="/">To do list</a>
        <h5 class=" text-white titre">Home</h5>
        <div class="d-flex navbarGauche">
            <?php
            if(!isset($_SESSION["role"]) || $_SESSION["role"] == ''){
                ?>
                <form class="formConnection" method="get">
                    <input class="btn-header" type="submit" name="action" value="Connexion" />
                </form>
                <form class="formConnection" method="get">
                    <input  class="btn-header" type="submit" name="action" value="Inscription"/>
                </form>
            <?php } else { ?>
                <form class="formConnection" method="get">
                    <input  class="btn-header" type="submit" name="action" value="Deconnexion"/>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>

<div class="w-75 d-flex justify-content-center flex-wrap mx-auto mt-3">
    <div class="w-100 d-flex justify-content-around align-items-center mb-4">
        <div class="accordion d-flex align-items-center " id="ajouterListe">
            <button type="button" class="btn btn-outline-success mr-1  text-nowrap " data-toggle="collapse"
                    data-target="#formAjouterListe" aria-expanded="false" aria-controls="formAjouterListe">+ Ajouter une
                Tâche
            </button>
            <div id="formAjouterListe" class="collapse ml-1 mr-2 pl-2 pr-2 border-right border-left"
                 data-parent="#ajouterListe">
                <form class="form d-flex align-items-center mb-0" method="post">
                    <div class="col">
                        <label class="sr-only" for="inputNomListe">Nom de la Tache</label>
                        <input id="inputNomListe" name="nom" class="form-control" type="text"
                               placeholder="Enter list title" maxlength="30" required>
                    </div>
                    <div class="col">
                        <label class="sr-only" for="inputDescriptionListe">Description de la Tache</label>
                        <textarea id="inputDescriptionListe" name="description" class="form-control"
                                  placeholder="Enter list description" maxlength="2000"
                                  style="max-height: 200px; min-height: 38px"></textarea>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-block btn-dark">Add</button>
                    </div>
                    <input type="hidden" name="action" value="ajouterTache">
                </form>
            </div>
        </div>
    </div>

    <?php

    $mdlTache = new MdlTache();
    $tabTaches = $mdlTache->voirTaches($idListe);

    if (isset($tabTaches)) { ?>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Titre de la Tâche</th>
                <th scope="col">Description</th>
                <th scope="col">Etat de la Tache</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tabTaches as $tache) {  ?>
                <tr>
                    <td><?php echo $tache["nom"] ?> </td>
                    <td><?php echo $tache["description"] ?> </td>
                    <td><form method="post"><a type="button" href="?action=changerEtatTache&idTache=<?php echo $tache['id']; ?>" <?php if($tache["etat"] == 1) echo "checked"; ?>"> <?php if($tache['etat'] == 0) echo 'A Faire'; else echo 'Terminé'; ?></form></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div>Aucune tâche pour cette liste</div>
    <?php } ?>
    <!--faire en sorte de valider le formulaire et envoyer l'action au controleur-->
</div>
</html>
