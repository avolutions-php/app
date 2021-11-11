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

use Avolutions\Routing\Route;
use Avolutions\Routing\RouteCollection;

$RouteCollection = $Container->get(RouteCollection::class);

/**
 * Register routes
 */
$RouteCollection->addRoute(new Route('/', [
    'controller' => 'test',
    'action' => 'index'
]));