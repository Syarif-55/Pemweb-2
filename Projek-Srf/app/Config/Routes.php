<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MataKuliah::index');
$routes->get('/Mbd', 'Matkul::Mbd');
$routes->get('/MJK', 'Matkul::MJK');
$routes->get('/MP', 'Matkul::MP');
$routes->get('/SIM','Matkul::Sim');
$routes->get('/mata_kuliah/details/(:segment)', 'MataKuliah::details/$1');
