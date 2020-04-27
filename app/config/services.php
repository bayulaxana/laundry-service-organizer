<?php
declare(strict_types=1);

use LaundryApp\Providers\SecurityHandler;
use Phalcon\Db\RawValue;
use Phalcon\Escaper;
use Phalcon\Events\Manager;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Stream as SessionAdapter;
use Phalcon\Session\Bag;
use Phalcon\Session\Manager as SessionManager;
use Phalcon\Url as UrlResolver;

// Configuration
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

// URL
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

// view
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();
            $volt = new VoltEngine($view, $this);
            $volt->setOptions([
                'path' => $config->application->voltCacheDir,
                'separator' => '_'
            ]);
            $voltCompiler = $volt->getCompiler();
            $voltCompiler->addFunction('strtotime', 'strtotime');
            $voltCompiler->addFunction('number_format', 'number_format');

            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    return $view;
});

// Database connection
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }

    return new $class($params);
});

// Metadata Adapter
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

// Flash
$di->set('flash', function () {
    $escaper = new Escaper();
    $flash = new Flash($escaper);
    $flash->setImplicitFlush(false);
    $flash->setAutoescape(false);
    $flash->setCssClasses([
        'error'   => 'ui message inverted red small',
        'success' => 'ui message inverted green small',
        'notice'  => 'ui message inverted blue small',
        'warning' => 'ui message inverted yellow small',
    ]);

    return $flash;
});

// Session
$di->setShared('session', function () {
    $session = new SessionManager();
    $files = new SessionAdapter([
        'savePath' => sys_get_temp_dir(),
    ]);
    $session->setAdapter($files);
    $session->start();

    return $session;
});

// SessionBag
$di->setShared('sessionBag', function() {
    return new Bag('bag');
});

// Dispatcher
$di->setShared('dispatcher', function() {
    $eventsManager = new Manager();
    $eventsManager->attach('dispatch:beforeExecuteRoute', new SecurityHandler);

    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});