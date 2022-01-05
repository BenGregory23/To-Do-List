
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

require'config/config.php';
require 'config/Autoload.php';
Autoload::_autoload();

require 'controleur/FrontController.php';

$frontController = new FrontController();