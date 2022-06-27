<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes System
$routes = new RouteCollection();
$routes->add('create_turbine', new Route(constant('URL_SUBFOLDER') . '/turbine/create', array('controller' => 'TurbineController', 'method'=>'createTurbine')));
$routes->add('read_turbine', new Route(constant('URL_SUBFOLDER') . '/turbine/{id}', array('controller' => 'TurbineController', 'method'=>'showTurbine'), array('id' => '[0-9]+')));
