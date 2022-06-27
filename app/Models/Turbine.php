<?php

namespace App\Models;

use PDO;

class Turbine extends Model
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

    public function setManufacture(string $manufacture)
    {
        $this->manufacture = $manufacture;
    }

    public function getDimensionPositive()
    {
        return $this->dimension_positive;
    }

    // SETTERS METHOD

    public function getDimensionNegative()
    {
        return $this->dimension_negative;
    }

    // CRUD OPERATIONS

    /**
     * create turbine
     * @param array $data
     * @return false|string|void
     */
    public function create(array $data)
    {
        $conn = $this->conn();
        $data['created'] = date('d-m-y h:i:s');
        $data['modified'] = date('d-m-y h:i:s');

        $sql = "INSERT INTO turbines (slug, manufacture, dimension_positive, dimension_negative, created, modified)
                    VALUES ('" . $data['slug'] . "', 
                            '" . $data['manufacture'] . "', 
                            '" . $data['dimension_positive'] . "', 
                            '" . $data['dimension_negative'] . "',
                            '" . $data['created'] . "',
                            '" . $data['modified'] . "')";

        // use exec() because no results are returned
        $conn->exec($sql);

        return $conn->lastInsertId();

    }

    public function read(int $id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM turbines WHERE id=".$id;

        // use exec() because no results are returned
        $result = $conn->query($sql);

        return $result->fetch(PDO::FETCH_ASSOC);

    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }



}