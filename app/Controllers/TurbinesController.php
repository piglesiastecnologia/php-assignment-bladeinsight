<?php
namespace App\Controllers;

use App\Models\Turbine;
use App\Models\User;

class TurbinesController extends Controller {

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

            if (!empty($result)) {
                $this->json_response($result);

            } else {
                $this->json_response("Not found", 404);

            }


        } else {
            $this->json_response("Method not allowed", 405);

        }

    }

    /**
     * createTurbine
     * @return void
     */
    public function createTurbine() {
        if($_SERVER['HTTP_X_CUSTOM_AUTHORIZATION']) {
            $user = new User();
            $check_user = $user->check_token($_SERVER['HTTP_X_CUSTOM_AUTHORIZATION']);

            if ($check_user) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $turbine = new Turbine();

                    if (!empty($_POST)) {
                        // Call the validation function
                        // the return will say if is a valid post or not and threat
                        // the strings removing unnecessary spaces and patterns
                        $validate = $turbine->validate($_POST);

                        if ($validate["is_valid"]) {
                            $id = $turbine->create($validate["data"]);

                            if (!empty($id)) {
                                $this->json_response("Create register success :: ID ".$id, 201);
                            } else {
                                $this->json_response("Can't create the record", 400);

                            }
                        } else {
                            $this->json_response($validate["data"], 400);

                        }


                    } else {
                        $this->json_response("Check your data request", 400);

                    }

                } else {
                    $this->json_response("Method not allowed", 405);

                }
            } else {
                $this->json_response("Please do the login first", 401);
            }

        } else {
            $this->json_response("Please we need the token to proceed", 401);

        }

    }

    /**
     * updateTurbine
     * @param int $id
     * @return void
     */
    public function updateTurbine(int $id) {
        if($_SERVER['HTTP_X_CUSTOM_AUTHORIZATION']) {
            $user = new User();
            $check_user = $user->check_token($_SERVER['HTTP_X_CUSTOM_AUTHORIZATION']);

            if ($check_user) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $turbine = new Turbine();

                    $validate = $turbine->validate($_POST, true);
                    if ($validate["is_valid"]) {
                        $result = $turbine->update($id, $validate["data"]);

                        if ($result) {
                            $this->json_response("Register update successfully :: ".$id);
                        } else {
                            $this->json_response("Register not updated :: ".$id, 400);
                        }
                    } else {
                        $this->json_response($validate["data"], 400);

                    }

                } else {
                    $this->json_response("Method not allowed", 405);

                }
            } else {
                $this->json_response("Please do the login first", 401);
            }

        } else {
            $this->json_response("Please we need the token to proceed", 401);

        }
    }

    /**
     * deleteTurbine
     * @param int $id
     * @return void
     */
    public function deleteTurbine(int $id)
    {
        if($_SERVER['HTTP_X_CUSTOM_AUTHORIZATION']) {
            $user = new User();
            $check_user = $user->check_token($_SERVER['HTTP_X_CUSTOM_AUTHORIZATION']);

            if ($check_user) {
                if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                    $turbine = new Turbine();
                    $result = $turbine->delete($id);

                    if ($result) {
                        $this->json_response("ID ".$id." was deleted successfully.");
                    } else {
                        $this->json_response("Register not deleted :: ".$id, 400);
                    }

                } else {
                    $this->json_response("Method not allowed", 405);

                }
            } else {
                $this->json_response("Please do the login first", 401);
            }

        } else {
            $this->json_response("Please we need the token to proceed", 401);

        }
    }

}