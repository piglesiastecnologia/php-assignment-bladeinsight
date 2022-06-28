<?php
namespace App\Controllers;

use App\Models\Turbine;

class TurbineController extends Controller {

    /**
     * showTurbine
     * @return void
     */
    public function showTurbine() {
        $turbine = new Turbine();
        $result = $turbine->read();

        $this->json_response($result);

    }

    /**
     * detailTurbine
     * @param int $id
     * @return void
     */
    public function detailTurbine(int $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $turbine = new Turbine();
            $result = $turbine->read($id);

            $this->json_response($result);

        } else {
            $this->json_response("Method not allowed", 405);

        }

    }

    /**
     * createTurbine
     * @return void
     */
    public function createTurbine() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $turbine = new Turbine();
            $turbine->create($_POST);

            if (!empty($record)) {

                $this->json_response("Create register success :: ".$turbine);
            }

        } else {
            $this->json_response("Method not allowed", 405);

        }
    }

    /**
     * updateTurbine
     * @param int $id
     * @return void
     */
    public function updateTurbine(int $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $turbine = new Turbine();
            $result = $turbine->update($id, $_POST);

            if ($result) {
                $this->json_response("Register update successfully :: ".$id);
            } else {
                $this->json_response("Register not updated :: ".$id, 404);
            }

        } else {
            $this->json_response("Method not allowed", 405);

        }
    }

    /**
     * deleteTurbine
     * @param int $id
     * @return void
     */
    public function deleteTurbine(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $turbine = new Turbine();
            $result = $turbine->delete($id);

            if ($result) {
                $this->json_response("ID ".$id." was deleted successfully.");
            } else {
                $this->json_response("Register not deleted :: ".$id, 404);
            }

        } else {
            $this->json_response("Method not allowed", 405);

        }
    }

}