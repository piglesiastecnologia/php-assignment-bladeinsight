<?php
namespace App\Controllers;

use App\Models\Turbine;
use Symfony\Component\Routing\RouteCollection;

class TurbineController {

    public function showTurbine(int $id, RouteCollection $routes) {
        $product = new Turbine();
        $product->read($id);

        require_once APP_ROOT . '/views/turbines/view.php';
    }
}