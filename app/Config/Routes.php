<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/categories', 'CategoryController::index');
$routes->get('/categories/create', 'CategoryController::create');
$routes->post('/categories/store', 'CategoryController::store');
$routes->get('/categories/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('/categories/update/(:num)', 'CategoryController::update/$1');
$routes->post('/categories/delete/(:num)', 'CategoryController::delete/$1');

// ARTICLE
$routes->get('/', 'ArticleController::index');
$routes->get('/articles/create', 'ArticleController::create');
$routes->post('/articles/store', 'ArticleController::store');
$routes->get('/articles/edit/(:num)', 'ArticleController::edit/$1');
$routes->post('/articles/update/(:num)', 'ArticleController::update/$1');
$routes->post('/articles/delete/(:num)', 'ArticleController::delete/$1');
$routes->get('/article/(:num)', 'ArticleController::detail/$1');

// BOOK
$routes->get('/books', 'BookController::index');
$routes->get('/books/create', 'BookController::create');
$routes->post('/books/store', 'BookController::store');
$routes->get('/books/edit/(:num)', 'BookController::edit/$1');
$routes->post('/books/update/(:num)', 'BookController::update/$1');
$routes->post('/books/delete/(:num)', 'BookController::delete/$1');