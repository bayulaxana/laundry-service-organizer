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

$router->add(
    '/delivery',
    [
        'controller' => 'pickupdelivery',
        'action' => 'delivery',
    ]
);

$router->add(
    '/delivery/new',
    [
        'controller' => 'pickupdelivery',
        'action' => 'newDelivery',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
