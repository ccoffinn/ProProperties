<?php

    class Property {
        private $propertyId; // for DB access
        public $price;
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
            // TODO DB query here
            $row = tempQuery($id);
            $this->fill($row);
        }
        private function fill($row) {
            $this->propertyId = $row['propertyId'];
            $this->price = $row['price'];
            $this->addressId = $row['addressId'];
            $this->energyRatingId = $row['energyRatingId'];
        }

        // getters & setters
        public function getPropertyId() {
            return $this->propertyId;
        }
        public function getPrice() {
            return $this->price;
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
        public function setAddressId($addressId) {
            $this->addressId = $addressId;
        }
        public function setEnergyRatingId($energyRatingId) {
            $this->energyRatingId = $energyRatingId;
        }
    }