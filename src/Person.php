<?php

    class Person {
        private $personID; // for easier DB access
        public $name;
        public $surname;

        // default constructor
        public function __construct() {}

        // helper methods for constructor
        public static function findByID($id) {
            $instance = new self();
            $instance->loadByID($id);
            return $instance;
        }
        private function loadByID($id) {
            try {
                require "DBconnect.php";
                $sql = "SELECT * FROM person WHERE ID = $id";
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->fill($row);
            }
            catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
        private function fill($row) {
            $this->personID = $row["ID"];
            $this->name = $row["name"];
            $this->surname = $row["surname"];
        }

        public function __toString() {
            return "$this->name $this->surname";
        }

        // getters & setters
        public function getPersonID() {
            return $this->personID;
        }
        public function getName() {
            return $this->name;
        }
        public function getSurname() {
            return $this->surname;
        }
        public function setName($name) {
            $this->name = $name;
        }
        public function setSurname($surname) {
            $this->surname = $surname;
        }
}

?>
