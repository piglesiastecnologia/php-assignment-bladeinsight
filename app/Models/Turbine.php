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

    /**
     * @param array $data
     * @return false|string|void
     */
    public function create(array $data) {
        $data['created'] = date('d-m-y h:i:s');
        $data['modified'] = date('d-m-y h:i:s');


        try {
            $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PASS);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO turbines (slug, manufacture, dimension_positive, dimension_negative, created, modified)
                    VALUES ('".$data['slug']."', 
                            '".$data['manufacture']."', 
                            '".$data['dimension_positive']."', 
                            '".$data['dimension_negative']."',
                            '".$data['created']."',
                            '".$data['modified']."')";

            // use exec() because no results are returned
            $conn->exec($sql);

            return $conn->lastInsertId();

        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }


    }

    public function read(int $id) {


        return $this;
    }

    public function update(int $id, array $data) {

    }

    public function delete(int $id) {

    }
}