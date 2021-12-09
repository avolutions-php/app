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
use Avolutions\Database\Migrator;

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
 * Set error handler
 */
$Application->setErrorHandler();

/**
 * Migrate the Database
 */
if (config('database/migrateOnAppStart')) {
    application(Migrator::class)->migrate();
}