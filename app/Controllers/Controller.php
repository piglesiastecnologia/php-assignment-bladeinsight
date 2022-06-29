<?php

namespace App\Controllers;

class Controller {

    /**
     * json_response
     * @param $data
     * @param int $httpStatus
     * @return void
     */
    function json_response($data=null, int $httpStatus=200) {
        // remove the previous header (if has...)
        header_remove();

        // set header to serve json structure
        header("Content-Type: application/json");

        // create the response code (REST structure)
        http_response_code($httpStatus);

        echo json_encode($data); exit();

    }

    /**
     * generateRandomString
     * @param $length
     * @return string
     */
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}