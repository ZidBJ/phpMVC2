<?php

use app\controllers\AuthController;
use app\controllers\SiteController;

require_once __DIR__ . '/../vendor/autoload.php';
// echo '<pre>';
// var_dump(dirname(__DIR__));
// echo '</pre>';
// exit;
$app = new \app\core\Application(dirname(__DIR__));

//  $router = new Router();
//  $app->userRouter($router);
$app->router->get('/fun', function () {
    echo "Function";
});

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->post('/contact', [SiteController::class, 'handelContact']);


$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);


$app->run();
