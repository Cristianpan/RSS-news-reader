<?php

use App\Controllers\CtrlWebsites;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/websites', [CtrlWebsites::class, 'index'], ['as' => 'websites']);
