<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'About::index');

// Authentication routes (public)
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

// Protected task management routes (require login)
$routes->group('', ['filter' => 'authfilter'], function($routes) {
    $routes->get('tasks/new', 'Tasks::create');
    $routes->post('tasks/store', 'Tasks::store');
    $routes->get('tasks/edit/(:num)', 'Tasks::edit/$1');
    $routes->post('tasks/update/(:num)', 'Tasks::update/$1');
    $routes->get('tasks/delete/(:num)', 'Tasks::delete/$1');
});
