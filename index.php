
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['role']) && !isset($_SESSION['login'])){
    $_SESSION['role'] = '';
    $_SESSION['login'] = '';
}

require'config/config.php';
require 'config/Autoload.php';
Autoload::_autoload();

require 'controleur/FrontController.php';

$frontController = new FrontController();