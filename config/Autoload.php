<?php

class Autoload
{
    public static function _autoload()
    {
        require 'config/Nettoyage.php';

        require 'DAL/AdminGateway.php';
        require 'DAL/TacheGateway.php';
        require 'DAL/UserGateway.php';
        require 'DAL/ListeGateway.php';

        require 'controleur/ControleurUtilisateur.php';
        require 'controleur/ControleurInvite.php';
        require 'controleur/FrontController.php';

        require 'modeles/MdlTache.php';
        require 'modeles/MdlListe.php';
        require 'modeles/MdlUtilisateur.php';

        require 'metier/Liste.php';
        require 'metier/Tache.php';
        require 'metier/Utilisateur.php';

        require 'vues/accueil.php';
    }
}


?>
