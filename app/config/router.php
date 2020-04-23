<?php

$router = $di->getRouter();

$router->add(
    '/login',
    [
        'controller' => 'index',
        'action' => 'login',
    ]
);

$router->add(
    '/logout',
    [
        'controller' => 'index',
        'action' => 'logout',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
