<?php

use App\Controllers\ContactController;
use App\Controllers\HomeController;
use PSR4\router\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/contact', [ContactController::class, 'index']);
$router->post('/contact', [ContactController::class, 'store']);
