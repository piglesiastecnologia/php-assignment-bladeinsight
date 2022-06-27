<?php
namespace App\Controllers;

use App\Models\Turbine;
use Symfony\Component\Routing\RouteCollection;

class TurbineController {

    public function showTurbine(int $id, RouteCollection $routes) {
        $turbine = new Turbine();
        $turbine->read($id);

        require_once APP_ROOT . '/views/turbines/view.php';
    }

    public function createTurbine() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $turbine = new Turbine();
            $turbine->create($_POST);

        } else {
            // return method not allowed
        }
    }
}