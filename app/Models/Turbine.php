<?php

namespace App\Models;

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

    // SETTERS METHOD
    public function setManufacture(string $manufacture) {
        $this->manufacture = $manufacture;
    }

    // CRUD OPERATIONS
    public function create(array $data) {

    }

    public function read(int $id) {

    }

    public function update(int $id, array $data) {

    }

    public function delete(int $id) {

    }
}