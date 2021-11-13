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

use Avolutions\Http\Request;

/**
 * Load the bootstrap file
 */
require_once '../bootstrap.php';

/**
 * Load the routes file
 */
require_once '../routes.php';

/**
 * Load the events file
 */
require_once '../events.php';

/**
 * Start the application
 */
$Request = $Application->get(Request::class);
$Application->start($Request);