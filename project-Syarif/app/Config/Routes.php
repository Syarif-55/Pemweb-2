<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);
$routes->get('/', 'Home::index');
$routes->get('/About','Page::about');
$routes->get('/Contact','Page::contact');
$routes->get('/Faqs','Page::faqs');
$routes->get('Biodata','Page::biodata');
