<?php

namespace App\Models;

class User extends Model {

    protected $username;
    protected $password;

    /**
     * getUsername
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * setUsername
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * getPassword
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * validate
     * @param $data
     * @return array
     */
    public function validate($data) {
        // Function settings
        $invalid = false;
        $response_validate = [];

        /**
         * > remove spaces with trim
         * > htmlspecialchars
         * > striplashes
         */
        $data = $this->basic_data_validation($data);
        $data['password'] = md5($data['password']);

        // Validation required fields
        if (empty($data['username'])) {
            $response_validate[] = "Username field is required.";
            $invalid = true;
        }

        if (empty($data['password'])) {
            $response_validate[] = "Password field is required.";
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

    /**
     * check_user
     * @param $data
     * @return void
     */
    public function check_user($data)
    {
        $sql = 'SELECT id FROM users WHERE username="'.$data['username'].'" AND password="'.$data['password'].'"';

        $conn = $this->conn();
        $conn->prepare($sql);

        $result = $conn->query($sql);

        return $result->fetchColumn();
    }


    /**
     * check_token
     * @param $data
     * @return mixed
     */
    public function check_token($token)
    {
        $sql = 'SELECT id FROM users WHERE token="'.$token.'"';

        $conn = $this->conn();
        $conn->prepare($sql);

        $result = $conn->query($sql);

        return $result->fetchColumn();
    }


    /**
     * update_user_token
     * @param $token
     * @param $id
     * @return bool
     */
    public function update_user_token($token, $id)
    {
        $sql = "UPDATE users 
                SET token='".$token."'
                WHERE id=".$id;


        $conn = $this->conn();
        $statement = $conn->prepare($sql);


        $statement->execute();

        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * create
     * @param array $data
     * @return false|string
     */
    public function create(array $data)
    {
        $conn = $this->conn();
        $data['created'] = date('d-m-y h:i:s');
        $data['modified'] = date('d-m-y h:i:s');

        $sql = "INSERT INTO users (`name`, username, password, token, created, modified)
                    VALUES ('" . $data['name'] . "', 
                            '" . $data['username'] . "', 
                            '" . $data['password'] . "', 
                            '" . $data['token'] . "',
                            '" . $data['created'] . "',
                            '" . $data['modified'] . "')";


        // use exec() because no results are returned
        $conn->exec($sql);

        return $conn->lastInsertId();

    }


}