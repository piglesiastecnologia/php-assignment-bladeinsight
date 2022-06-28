<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes System
$routes = new RouteCollection();
$routes->add('read_turbine', new Route(constant('URL_SUBFOLDER') . '/turbine',
    array('controller' => 'TurbineController', 'method'=>'showTurbine')));

$routes->add('create_turbine', new Route(constant('URL_SUBFOLDER') . '/turbine/create',
    array('controller' => 'TurbineController', 'method'=>'createTurbine')));

$routes->add('turbine_detail', new Route(constant('URL_SUBFOLDER') . '/turbine/{id}',
    array('controller' => 'TurbineController',
        'method'=>'detailTurbine'),
    array('id' => '[0-9]+')));

$routes->add('turbine_update', new Route(constant('URL_SUBFOLDER') . '/turbine/update/{id}',
    array('controller' => 'TurbineController',
        'method'=>'updateTurbine'),
    array('id' => '[0-9]+')));

$routes->add('turbine_delete', new Route(constant('URL_SUBFOLDER') . '/turbine/delete/{id}',
    array('controller' => 'TurbineController',
        'method'=>'deleteTurbine'),
    array('id' => '[0-9]+')));