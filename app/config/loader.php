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
    ]
);

$loader->registerNamespaces(
    [
        /**
         * SQL Server DB
         */
        'Phalcon\Db\Adapter\Pdo' => APP_PATH . '/library/Phalcon/Db/Adapter/Pdo',
        'Phalcon\Db\Dialect' => APP_PATH . '/library/Phalcon/Db/Dialect',
        'Phalcon\Db\Result' => APP_PATH . '/library/Phalcon/Db/Result',
    ]
);

$loader->register();
