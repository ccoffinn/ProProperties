<?php

require 'EnergyRating.php';

        // call default constructor
        $test1 = new EnergyRating();

        // create object through database
        echo "test1: " . EnergyRating::findByID(1);

        // set rating of test1 object
        EnergyRating::setRating(1);
        echo "test2: " . $test1->getRating();

?>