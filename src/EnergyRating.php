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
            // TODO DB query here
            $row = tempQuery($id);
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
