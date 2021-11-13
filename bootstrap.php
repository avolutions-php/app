<?php
/**
 * AVOLUTIONS
 *
 * Just another open source PHP framework.
 *
 * @copyright   Copyright (c) 2019 - 2021 AVOLUTIONS
 * @license     MIT License (https://avolutions.org/license)
 * @link        https://avolutions.org
 */

use Avolutions\Core\Application;
use Avolutions\Config\Config;
use Avolutions\Database\Database;
use Avolutions\Logging\Logger;

/**
 * Get start time
 */
define('START_TIME', microtime(true));

/**
 * Register the Autoloader
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Create Application
 */
$Application = new Application(__DIR__);

/**
 * Configure Container
 */
// TODO to own file. How can we override this?
$Config = $Application->get(Config::class);
$Application->setConstructorParams(
    Database::class,
    [
        'host' => $Config->get('database/host'),
        'database' => $Config->get('database/database'),
        'port' => $Config->get('database/port'),
        'user' => $Config->get('database/user'),
        'password' => $Config->get('database/password'),
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $Config->get('database/charset'),
            PDO::ATTR_PERSISTENT => true
        ]
    ]
);
$Application->setConstructorParams(
    Logger::class,
    [
        'logpath' => $Config->get('logger/logpath'),
        'logfile' => $Config->get('logger/logfile'),
        'minLogLevel' => $Config->get('logger/loglevel'),
        'datetimeFormat' => $Config->get('logger/datetimeFormat'),
    ]
);

/**
 * Set error handler
 */
$Application->setErrorHandler();

/**
 * Migrate the Database
 */
/*if ($Config->get('database/migrateOnAppStart')) {
    Database::migrate();
}*/