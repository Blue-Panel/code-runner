<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'DashboardController::index');

// Automation UI Handling (Crud)
$routes->group('automation', static function ($routes) {
    $routes->get('create-view', 'AutomationController::createView');
    $routes->post('create', 'AutomationController::create');
    $routes->get('enable/(:num)', 'AutomationController::enable/$1');
    $routes->get('disable/(:num)', 'AutomationController::disable/$1');
});


service('auth')->routes($routes);
