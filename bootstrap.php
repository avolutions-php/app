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
$Application->set(
    Database::class,
    [
        'host' => config('database/host'),
        'database' => config('database/database'),
        'port' => config('database/port'),
        'user' => config('database/user'),
        'password' => config('database/password'),
        'charset' => config('database/charset'),
        'options' => [
            PDO::ATTR_PERSISTENT => true
        ]
    ]
);
$Application->set(
    Logger::class,
    [
        'logpath' => config('logger/logpath'),
        'logfile' => config('logger/logfile'),
        'minLogLevel' => config('logger/loglevel'),
        'datetimeFormat' => config('logger/datetimeFormat'),
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