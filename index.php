<?php

use App\Controllers\HomeController;
use App\Controllers\UsersController;
use App\Controllers\AdminController;
use App\Core\Routeur;
use App\Core\TemplateEngine;
use App\Kernel;

require 'vendor/autoload.php';

$routeur = new Routeur();
$routeur->addRoute(['GET'], '/', HomeController::class, 'index');
$routeur->addRoute(['GET'], '/admin', AdminController::class, 'dashboard');
$routeur->addRoute(['GET'], '/signup', UsersController::class, 'signup');
$routeur->addRoute(['POST'], '/signup', UsersController::class, 'signup');
$routeur->addRoute(['GET'], '/login', UsersController::class, 'login');
$routeur->addRoute(['POST'], '/login', UsersController::class, 'login');
$routeur->addRoute(['GET'], '/dashboard', UsersController::class, 'dashboard');
$routeur->addRoute('GET', '/about', HomeController::class, 'about');
$routeur->addRoute('GET', '/contact', HomeController::class, 'contact');


new Kernel($routeur);