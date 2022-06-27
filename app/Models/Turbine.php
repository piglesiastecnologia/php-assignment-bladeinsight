<?php

namespace App\Models;

use PDO;

class Turbine
{

    protected $id;
    protected $slug;
    protected $manufacture;
    protected $dimension_positive;
    protected $dimension_negative;

    // GETTERS METHODS
    public function getId()
    {
        return $this->id;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getManufacture()
    {
        return $this->manufacture;
    }

    public function getDimensionPositive()
    {
        return $this->dimension_positive;
    }

    public function getDimensionNegative()
    {
        return $this->dimension_negative;
    }

    // SETTERS METHOD
    public function setManufacture(string $manufacture) {
        $this->manufacture = $manufacture;
    }

    // CRUD OPERATIONS
    public function create(array $data) {
        echo "na model :: <pre>";
        print_r($data);
        echo "</pre>";
        die();

        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PASS);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO turbines (slug, manufacture, dimension_positive, dimension_negative)
                    VALUES ('John', 'Doe', 'john@example.com')";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }


    }

    public function read(int $id) {

        $this->id = 1;
        $this->slug = 'Amaral1-1';
        $this->manufacture = 'Gamesa';
        $this->dimension_positive = "39.026628121";
        $this->dimension_negative =  "-9.048632539";

        return $this;
    }

    public function update(int $id, array $data) {

    }

    public function delete(int $id) {

    }
}