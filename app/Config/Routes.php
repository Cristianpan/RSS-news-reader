<?php

use App\Controllers\CtrlNews;
use App\Controllers\CtrlWebsites;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//news
$routes->get('/', [CtrlNews::class, 'index'], ['as' => 'news']);
$routes->post('/', [CtrlNews::class, 'update'], ['as' => 'news-update']);

//websites
$routes->get('/websites', [CtrlWebsites::class, 'index'], ['as' => 'websites']);
$routes->post('/websites/create', [CtrlWebsites::class, 'create'], ['as' => 'websites']);
$routes->post('/websites/delete/(:segment)', [CtrlWebsites::class, 'delete/$1'], ['as' => 'websites-delete']);

