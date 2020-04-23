<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir,
        $config->application->formDir,
    ]
);

$loader->registerNamespaces(
    [
        /**
         * SQL Server DB Namespace
         */
        'Phalcon\Db\Adapter\Pdo' => APP_PATH . '/library/Phalcon/Db/Adapter/Pdo',
        'Phalcon\Db\Dialect' => APP_PATH . '/library/Phalcon/Db/Dialect',
        'Phalcon\Db\Result' => APP_PATH . '/library/Phalcon/Db/Result',

        /**
         * Providers Namespaces
         */
        'LaundryApp\Providers' => APP_PATH . '/providers',

        /**
         * Forms Namespaces
         */
        'LaundryApp\Forms' => APP_PATH . '/forms',
    ]
);

$loader->register();
