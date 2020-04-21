<?php

$router = $di->getRouter();

$router->add(
    '/login',
    [
        'controller' => 'index',
        'action' => 'login',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
