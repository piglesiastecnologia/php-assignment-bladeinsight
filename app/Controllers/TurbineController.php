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
            $record = $turbine->create($_POST);

            if (!empty($record)) {

                $this->json_response("Create register success :: ".$record);
            }

        } else {
            // return method not allowed
        }
    }


    function json_response($data=null, $httpStatus=200) {
        header_remove();

        header("Content-Type: application/json");

        http_response_code($httpStatus);

        echo json_encode($data);

        exit();
    }
}