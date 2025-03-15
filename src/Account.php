<?php

    class Account {
        private $accountId; // for DB access
        public $email;
        public $password;
        public $addressId;
        public $authorizationId;

        // default constructor
        public function __construct() {}

        // helper methods for constructor
        public static function findByID($id) {
            $instance = new self();
            $instance->loadByID($id);
            return $instance;
        }
        private function loadByID($id) {
            require_once "DBconnect.php";
            $sql = "SELECT * FROM account WHERE accountId = $id";
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            $this->fill($row);
        }
        private function fill($row) {
            $this->accountId = $row['ID'];
            $this->email = $row["email"];
            $this->password = $row["password"];
            $this->addressId = $row["addressID"];
            $this->authorizationId = $row["authorizationID"];
        }

        // getters & setters
        public function getAccountId() {
            return $this->accountId;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getAddressId() {
            return $this->addressId;
        }
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
?>