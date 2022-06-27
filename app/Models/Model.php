<?php

namespace App\Models;

class Model
{
    /**
     * conn DB
     * @return PDO|void
     */
    protected function conn(){
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;

        } catch (PDOException $e) {
            echo "Erro ao conectar com o MySQL: <br>" . $e->getMessage();
        }

    }
}