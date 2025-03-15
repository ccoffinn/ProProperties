<?php

    class EnergyRating {
        private static $ratingId = array();
        private static $rating;

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
            $sql = "SELECT * FROM energyrating WHERE ratingId = $id";
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
            $this->fill($row);
        }
        private function fill($row) {
            self::$ratingId = $row["ID"];
            self::$rating = $row["rating"];
        }

        // getters & setters
        public function getRating() {
            return self::$rating;
        }
        public static function setRating($index)
        {
            self::$rating = self::$ratingId[$index];
        }
    }
