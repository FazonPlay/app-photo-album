<?php
// Define the base directory
const BASE_DIR = __DIR__;

// Autoloader function
spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $class = str_replace('App\\', '', $class);
    $file = BASE_DIR . '/src/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

use App\Controllers\HomeController;
use App\Controllers\UsersController;
use App\Core\Routeur;
use App\Kernel;

$routeur = new Routeur();
$routeur->addRoute(['GET'], '/ping', HomeController::class, 'ping');
$routeur->addRoute(['GET'], '/users/{id}', UsersController::class, 'user');
$routeur->addRoute(['GET'], '/', HomeController::class, 'index');
$routeur->addRoute(['GET'], '/users', UsersController::class, 'liste');
$routeur->addRoute(['GET'],'/templates',HomeController::class, 'home' );
new Kernel($routeur);
