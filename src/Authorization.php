<?php
    // TODO connect to DB
    class Authorization {
        private static $authId = array();
        public static $authLevel;

        // default constructor
        public function __construct() {

        }

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
            self::$authId[$row['id']] = $row['ID'];
            self::$authLevel = $row["level"];
        }

        // getters & setters
        public static function getAuthLevel()
        {
            return self::$authLevel;
        }
        public static function setAuthLevel($index)
        {
            self::$authLevel = self::$authId[$index];
        }
}
?>