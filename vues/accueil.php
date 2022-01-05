<html lang="en">
<head>
    <title>Acceuil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/accueil.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#modalErreur').modal('show');
        });
    </script>
</head>
<body style="background-image: url("")" >
<nav class="p-1 navbar-dark bg-dark sticky-top">
    <div class="d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="/">To do list</a>
        <h5 class=" text-white titre">Home</h5>
        <div class="d-flex navbarGauche">
            <?php if($_SESSION["role"] == NULL){
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

<?php if (isset($tabInfo) && count($tabInfo)>0){?>
    <div class="modal fade" id="modalErreur" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header <?php echo ($tabInfo["type"]=="erreur") ?  "alert-danger" : "alert-success" ; ?> " style="border-bottom: 1px solid #aaa8a8">
                    <?php echo ($tabInfo["type"]=="erreur") ?  "<h5 class=\"modal-title\">Error</h5>" : "<h5 class=\"modal-title\">Information</h5>" ; ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body <?php echo ($tabInfo["type"]=="erreur") ?  "alert-danger" : "alert-success" ; ?>">
                    <?php
                    echo "<p>".$tabInfo["message"]."</p>";
                    ?>
                </div>
                <div class="modal-footer <?php echo ($tabInfo["type"]=="erreur") ?  "alert-danger" : "alert-success" ; ?>" style="border-top: 1px solid #aaa8a8">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<div class="w-75 d-flex justify-content-center flex-wrap mx-auto mt-3">
    <div class="w-100 d-flex justify-content-around align-items-center mb-4">
        <div class="accordion d-flex align-items-center " id="ajouterListe">
            <button type="button" class="btn btn-outline-success mr-1  text-nowrap " data-toggle="collapse" data-target="#formAjouterListe" aria-expanded="false" aria-controls="formAjouterListe" >+ Ajouter une nouvelle liste</button>
            <div id="formAjouterListe" class="collapse ml-1 mr-2 pl-2 pr-2 border-right border-left" data-parent="#ajouterListe">
                <form class="form d-flex align-items-center mb-0" method="post" >
                    <div class="col">
                        <label class="sr-only" for="inputNomListe">List title</label>
                        <input id="inputNomListe" name="nom" class="form-control" type="text" placeholder="Enter list title" maxlength="30" required >
                    </div>
                    <div class="col">
                        <label class="sr-only" for="inputDescriptionListe">List description</label>
                        <textarea id="inputDescriptionListe" name="description" class="form-control" placeholder="Enter list description" maxlength="2000" style="max-height: 200px; min-height: 38px"></textarea>
                    </div>
                    <?php if(isset($_SESSION["role"]) && isset($_SESSION["login"])){

                    if ($_SESSION["role"] == "user" && $_SESSION["login"] != NULL) { ?>
                    <div class="col">
                        <label>
                            <input id="inputPrivateChecker" name="isPublic" type="checkbox">
                            Private list
                        </label>
                    </div>
                    <?php
                    }} ?>
                    <div class="col">
                        <button type="submit" href="/" class="btn btn-block btn-dark">Add</button>
                    </div>
                    <input type="hidden" name="action" value="ajouterListe">
                </form>
            </div>
        </div>
    </div>


    <?php

    $mdlListe = new MdlListe();
    try {
        $tabListes = $mdlListe->mdlFindAllListes();
    } catch (Exception $e) {
        echo $e;
    }

    if (isset($tabListes)){ ?>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">List title</th>
                <th scope="col">Type</th>
                <th scope="col">Pseudonyme</th>
                <th scope="col">Public or Private</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tabListes as $liste){ ?>
                    <?php if($liste["isPublic"] == 0 && $_SESSION['role'] != "user" && $_SESSION['login'] != $liste['pseudo']) continue; ?>
                <tr>
                    <td><a type="button" href="?action=voirListePb&idListe=<?php echo $liste["id"]; ?>"><?php echo $liste["nom"]?></a></td>
                    <td><?php echo $liste["description"]?> </td>
                    <td><?php echo $liste["pseudo"]?> </td>
                    <td><?php if($liste["isPublic"] == 0) echo "Private"; else echo "Public"; ?>  </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php }else{ ?>
        <div>No lists available</div>
    <?php } ?>
</div>
</body>
</html>
