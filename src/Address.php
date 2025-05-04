<?php
    class Address {
        private $addressId; // for DB access
        public $line1;
        public $line2;
        public $line3;
        public $countyCity;
        public $eircode;

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
                $sql = "SELECT * FROM address WHERE ID = $id";
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
            $this->addressId = $row["ID"];
            $this->line1 = $row['line1'];
            $this->line2 = $row['line2'];
            $this->line3 = $row['line3'];
            $this->countyCity = $row['countyCity'];
            $this->eircode = $row['eircode'];
        }

        public function __toString() {
            return "$this->line1, $this->line2, $this->line3 $this->countyCity, $this->eircode";
        }

        // getters & setters
        public function getAddressId(){
            return $this->addressId;
        }
        public function getLine1() {
            return $this->line1;
        }
        public function getLine2() {
            return $this->line2;
        }
        public function getLine3() {
            return $this->line3;
        }
        public function getCountyCity() {
            return $this->countyCity;
        }
        public function getEircode() {
            return $this->eircode;
        }
        public function setLine1($line1) {
            $this->line1 = $line1;
        }
        public function setLine2($line2) {
            $this->line2 = $line2;
        }
        public function setLine3($line3) {
            $this->line3 = $line3;
        }
        public function setCountyCity($countyCity) {
            $this->countyCity = $countyCity;
        }
        public function setEircode($eircode) {
            $this->eircode = $eircode;
        }
    }
?>