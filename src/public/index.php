<?php 

declare(strict_types=1);

include __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = new App\Config($_ENV);

$router = (new App\Core\Router())
        ->get('/', [App\Controllers\HomeController::class, 'index'])
        ->get('/user', [App\Controllers\UserController::class, 'index'])
        ->get('/user/upload', [App\Controllers\UserController::class, 'upload'])
        ->post('/user/upload', [App\Controllers\UserController::class, 'store']);

(new App\App(
    [
        'uri' => $_SERVER['REQUEST_URI'], 
        'method' => $_SERVER['REQUEST_METHOD']
    ],
    $router, 
    $config
))->run();