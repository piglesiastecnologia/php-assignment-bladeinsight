<?php

namespace App\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $validate = $user->validate($_POST);

            if ($validate['is_valid']) {
                $user_id = $user->check_user($validate["data"]);

                if ($user_id != 0 && !empty($user_id)) {
//                    session_start();
//                    $_SESSION['logged'] = true;
                    $token = $this->generateRandomString(100);
                    $user->update_user_token($token, $user_id);


                    $this->json_response("Token :: ".$token, 302);

                } else {
                    $this->json_response("Please register your user", 401);

                }

            } else {
                $this->json_response($validate["data"], 400);
            }

        } else {
            $this->json_response("Method not allowed", 405);

        }
    }

    public function logout()
    {
        session_destroy();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $validate = $user->validate($_POST);

            if ($validate['is_valid']) {
                $token = $this->generateRandomString(100);
                $validate["data"]['token'] = $token;

                $id = $user->create($validate["data"]);

                if (!empty($id)) {
                    $this->json_response("User created :: Token > ".$token, 302);
                } else {
                    $this->json_response("Can't create the record", 400);

                }

            } else {
                $this->json_response($validate["data"], 400);
            }

        } else {
            $this->json_response("Method not allowed", 405);

        }
    }
}