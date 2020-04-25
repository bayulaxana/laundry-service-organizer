<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');
define('localhost', '127.0.0.1');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Sqlsrv',
        'host'        => 'localhost',
        'username'    => 'bayulaxana',
        'password'    => 'Bayulaxana05',
        'dbname'      => 'lso_test',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'formDir'        => APP_PATH . '/forms/',
        'voltCacheDir'   => BASE_PATH . '/cache/volt/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => BASE_PATH . '/db/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => '/',
        'apiDir'         => APP_PATH . '/controllers/API/',
    ]
]);