<?php

class Booking {
    private $bookingId; // for DB access
    public $date;
    public $time;
    public $propertyId;
    public $personId;

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
            $sql = "SELECT * FROM booking WHERE ID = $id";
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
        $this->bookingId = $row['bookingId'];
        $this->date = $row['date'];
        $this->time = $row['time'];
        $this->propertyId = $row['propertyId'];
        $this->personId = $row['personId'];
    }

    public function __toString() {
        $property = Property::findByID($this->propertyId);
        $space = " - ";
        return $this->date . $space . $this->time . $space . Address::findByID($property->getAddressId()) . $space . Person::findByID($this->personId);
    }

    // getters & setters
    public function getBookingId() {
        return $this->bookingId;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function getPropertyId() {
        return $this->propertyId;
    }

    public function getPersonId() {
        return $this->personId;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function setPropertyId($propertyId) {
        $this->propertyId = $propertyId;
    }

    public function setPersonId($personId) {
        $this->personId = $personId;
    }
}
