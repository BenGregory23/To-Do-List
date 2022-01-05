
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require'config/config.php';
require_once 'config/Nettoyage.php';

require 'DAL/TacheGateway.php';
require 'DAL/UserGateway.php';
require 'DAL/ListeGateway.php';

require 'controleur/ControleurUtilisateur.php';
require_once 'controleur/ControleurInvite.php';
require 'controleur/FrontController.php';

require 'modeles/MdlTache.php';
require 'modeles/MdlListe.php';
require 'modeles/MdlUtilisateur.php';
require 'modeles/MdlUtilisateurConnecte.php';

require_once 'metier/Tache.php';
require_once 'metier/Liste.php';

$frontController = new FrontController();