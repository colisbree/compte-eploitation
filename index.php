<?php
use Warot\App\Autoloader;

require './app/Autoloader.php';
Autoloader::register();

define('DIR_ROOT', __DIR__.DIRECTORY_SEPARATOR);

//----------------------------------------------------------------
// 
//----------------------------------------------------------------

ob_start();
require './pages/home.php';
$content = ob_get_clean();

// Affichage page par défaut
require './pages/templates/default.php';