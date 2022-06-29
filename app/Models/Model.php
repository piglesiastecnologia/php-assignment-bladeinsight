<?php

namespace App\Models;

use PDO;

class Model {

    /**
     * connection DB
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

    /**
     * basic_data_validation
     * @param array $data
     * @return string
     */
    public function basic_data_validation(array $data) {

        foreach ($data as $key => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
            $data[$key] = $value;
        }

        return $data;

    }

    // Basic functions CRUD

    /**
     * base_read
     * @param int|null $id
     * @return array|false
     */
    public function base_read(string $model, int $id)
    {
        if (empty($id)) {
            $sql = "SELECT * FROM $model";
        } else {
            $sql = "SELECT * FROM $model WHERE id=" . $id;
        }

        $conn = $this->conn();
        $result = $conn->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * base_delete
     * @param string $model
     * @param int $id
     * @return bool
     */
    public function base_delete(string $model, int $id)
    {
        $sql = "DELETE FROM $model WHERE id = :id";
        $conn = $this->conn();
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}