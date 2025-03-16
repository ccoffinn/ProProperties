<?php

    class Property {
        private $propertyId; // for DB access
        public $price;
        public $numBeds;
        public $numBaths;
        public $footage;
        public $addressId;
        public $energyRatingId;

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
                $sql = "SELECT * FROM property WHERE ID = $id";
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
            $this->propertyId = $row['ID'];
            $this->price = $row['price'];
            $this->numBeds = $row['numBeds'];
            $this->numBaths = $row['numBaths'];
            $this->footage = $row['footage'];
            $this->addressId = $row['addressId'];
            $this->energyRatingId = $row['energyRatingId'];
        }

        // function to access all properties for listing page
        public static function getAllProperties() {
            try {
                require "DBconnect.php";
                $sql = "SELECT * FROM property";
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }
            catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        public function __toString() {
            return Address::findByID($this->addressId) . ", " . $this->price . ", " . $this->numBeds . ", " . $this->numBaths . ", " . $this->footage . ", " . EnergyRating::findByID($this->energyRatingId);
        }

        // getters & setters
        public function getPropertyId() {
            return $this->propertyId;
        }
        public function getPrice() {
            return $this->price;
        }
        public function getNumBeds() {
            return $this->numBeds;
        }
        public function getNumBaths() {
            return $this->numBaths;
        }
        public function getFootage() {
            return $this->footage;
        }
        public function getAddressId() {
            return $this->addressId;
        }
        public function getEnergyRatingId() {
            return $this->energyRatingId;
        }
        public function setPrice($price) {
            $this->price = $price;
        }
        public function setNumBeds($numBeds) {
            $this->numBeds = $numBeds;
        }
        public function setNumBaths($numBaths) {
            $this->numBaths = $numBaths;
        }
        public function setFootage($footage) {
            $this->footage = $footage;
        }
        public function setAddressId($addressId) {
            $this->addressId = $addressId;
        }
        public function setEnergyRatingId($energyRatingId) {
            $this->energyRatingId = $energyRatingId;
        }
    }