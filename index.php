
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require'config/config.php';

require 'DAL/TacheGateway.php';
require 'DAL/UserGateway.php';
require 'DAL/ListeGateway.php';
require 'controleur/ControleurUtilisateur.php';

require 'modeles/MdlTache.php';
require 'modeles/MdlListe.php';

require 'vues/accueil.php';

//instanciation du controleur qui va récupérer les différentes validations de form
$controler = new ControleurUtilisateur();