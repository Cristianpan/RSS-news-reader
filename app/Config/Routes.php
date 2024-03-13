<?php

use App\Controllers\CtrlNews;
use App\Controllers\CtrlWebsites;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//news
$routes->get('/', [CtrlNews::class, 'index'], ['as' => 'news']);
$routes->get('/update-news', [CtrlNews::class, 'update'], ['as' => 'news-update']);

//websites
$routes->get('/websites', [CtrlWebsites::class, 'index'], ['as' => 'websites']);
$routes->post('/websites/create', [CtrlWebsites::class, 'create'], ['as' => 'website-create']);
$routes->post('/websites/delete', [CtrlWebsites::class, 'delete'], ['as' => 'websites-delete']);

