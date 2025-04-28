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
            try {
                require "DBconnect.php";
                $sql = "SELECT * FROM energyrating WHERE ID = $id";
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
            self::$ratingId = $row["ID"];
            self::$rating = $row["rating"];
        }

        public function __toString() {
            $test2 = (String) self::$rating;
            return $test2;
        }

        // getters & setters
        public function getRating() {
            return self::$rating;
        }
        public static function setRating($index)
        {
            self::$rating = self::findByID($index);
        }
    }
