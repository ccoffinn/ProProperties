<?php

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
            require_once "DBconnect.php";
            $sql = "SELECT * FROM authorization WHERE authId = $id";
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll();
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