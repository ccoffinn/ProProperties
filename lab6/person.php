<?php

    class person {
        public $name;
        public $surname;

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
