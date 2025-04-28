<?php
require "Person.php";
require "Authorization.php";

class Account {
    private $accountId; // for DB access
    public $email;
    private $password;
    public $personId;
    public $authorizationId;

    // default constructor
    public function __construct() {}

    public static function findByID($id) {
        $instance = new self();
        $instance->loadByID($id);
        return $instance;
    }

    private function loadByID($id) {
        try {
            require "DBconnect.php";
            $sql = "SELECT * FROM account WHERE ID = :id";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $this->fill($row);
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    }

    public static function findByEmail($email) {
        $instance = new self();
        if ($instance->loadByEmail($email)) { // Check if user is found
            return $instance;
        }
        return null; // Return null if no user is found
    }

    private function loadByEmail($email) {
        try {
            require "DBconnect.php";
            $sql = "SELECT * FROM account WHERE email = :email"; // Use placeholder
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $this->fill($row);
                return true; // User found
            }

            return false; // User not found
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    private function fill($row) {
        $this->accountId = $row['ID'];
        $this->email = $row["email"];
        $this->password = $row["password"];
        $this->personId = $row["personID"];
        $this->authorizationId = $row["authorizationID"];
    }

    public function __toString() {
        return $this->email . " " . $this->password . " " . Person::findById($this->personId) . " " . Authorization::findById($this->authorizationId);
    }

    // Getters & Setters
    public function getAccountId() {
        return $this->accountId;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    // public function getAddressId() {
    //     return $this->addressId;
    // }
    public function getAuthorizationId() {
        return $this->authorizationId;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setAddressId($addressId) {
        $this->addressId = $addressId;
    }
    public function setAuthorizationId($authorizationId) {
        $this->authorizationId = $authorizationId;
    }
}
