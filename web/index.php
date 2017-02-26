<?php 
$container = require __DIR__ . '/../system/bootstrap.php';

echo $container->call(
    ['App\Http\Routing\RouteDispatcher', 'dispatch'], 
    [$_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']]
);