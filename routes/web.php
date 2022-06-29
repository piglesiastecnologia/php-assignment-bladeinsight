<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes System
$routes = new RouteCollection();
$routes->add('read_turbine', new Route(constant('URL_SUBFOLDER') . '/turbine',
    array('controller' => 'TurbinesController', 'method'=>'showTurbine')));

$routes->add('create_turbine', new Route(constant('URL_SUBFOLDER') . '/turbine/create',
    array('controller' => 'TurbinesController', 'method'=>'createTurbine')));

$routes->add('turbine_detail', new Route(constant('URL_SUBFOLDER') . '/turbine/{id}',
    array('controller' => 'TurbinesController',
        'method'=>'detailTurbine'),
    array('id' => '[0-9]+')));

$routes->add('turbine_update', new Route(constant('URL_SUBFOLDER') . '/turbine/update/{id}',
    array('controller' => 'TurbinesController',
        'method'=>'updateTurbine'),
    array('id' => '[0-9]+')));

$routes->add('turbine_delete', new Route(constant('URL_SUBFOLDER') . '/turbine/delete/{id}',
    array('controller' => 'TurbinesController',
        'method'=>'deleteTurbine'),
    array('id' => '[0-9]+')));



$routes->add('login', new Route(constant('URL_SUBFOLDER') . '/login',
    array('controller' => 'UsersController', 'method'=>'login')));

$routes->add('logout', new Route(constant('URL_SUBFOLDER') . '/logout',
    array('controller' => 'UsersController', 'method'=>'logout')));


$routes->add('register', new Route(constant('URL_SUBFOLDER') . '/register',
    array('controller' => 'UsersController', 'method'=>'register')));