<?php
// app/core/bootstrap.php
namespace Core;
use Core\Router;

// 1) instancie le routeur
$router = new Router();

// 2) importe les définitions de routes
require __DIR__ . '/../routes/web.php';

// 3) lance le dispatch
$router->dispatch();
