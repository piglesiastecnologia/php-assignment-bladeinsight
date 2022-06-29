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

    public function __construct()
    {
    }

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

    /**
     * read
     * @param int|null $id
     * @return array|false
     */
    public function read(int $id = null)
    {
        return $this->base_read("turbines", $id);
    }

    /**
     * update
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data)
    {
        $sql = "UPDATE turbines 
                SET manufacture=:manufacture, 
                    dimension_positive=:dimension_positive, 
                    dimension_negative=:dimension_positive 
                WHERE id=:id";


        $conn = $this->conn();
        $statement = $conn->prepare($sql);

        // bind values
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':manufacture', $data['manufacture']);
        $statement->bindParam(':dimension_positive', $data['dimension_positive']);
        $statement->bindParam(':dimension_negative', $data['dimension_negative']);

        $statement->execute();

        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * delete
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        return $this->base_delete("turbines", $id);
    }

    public function validate($data, $is_update = false) {
        // Function settings
        $invalid = false;
        $response_validate = [];

        /**
         * > remove spaces with trim
         * > htmlspecialchars
         * > striplashes
         */
        $data = $this->basic_data_validation($data);

        // Validation required fields
        if (empty($data['manufacture'])) {
            $response_validate[] = "Manufacture field is required.";
            $invalid = true;
        }

        if (empty($data['dimension_positive'])) {
            $response_validate[] = "Positive Dimension field is required.";
            $invalid = true;
        }

        if (empty($data['dimension_negative'])) {
            $response_validate[] = "Negative Dimension field is required.";
            $invalid = true;
        }

        if ($invalid) {
            return [
                "is_valid" => false,
                "data" => $response_validate
            ];
        } else {
            return [
                "is_valid" => true,
                "data" => $data
            ];
        }

    }

}