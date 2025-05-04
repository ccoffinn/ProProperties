<?php
require "../src/Property.php";
require "../src/Booking.php";

// Test 4 Property displayByAttribute
try {
    $expected = 2; // 2 properties expected
    $result = "Failed.";
    echo "TEST 4: Property Class displayByAttribute function.\n";
    echo "Expected output:\n";
    echo $expected . " Properties with 2 beds.\n";
    echo "Output: \n";
    $test4 = Property::displayByAttribute("beds = 2");
    echo count($test4) . " Properties with 2 beds.\n";

    if (count($test4) == $expected) {
        $result = "Passed.";
    }
    echo "TEST 4: " . $result . "\n";
}
catch (Exception $e) {
    echo "TEST 4: FAILED.\n" . $e->getMessage();
}

echo "\n\n";

// Test 4 ALTERNATIVE Booking getBookingID
try {
    $expected = 1;
    $result = "Failed.";
    echo "TEST 5: Booking Class getBookingID function.\n";
    echo "Expected output:\n";
    echo $expected . "\n";
    echo "Output: \n";
    $test4 = Booking::findByID(1);
    $test4ID = $test4->getBookingId();
    echo $test4ID . "\n";

    if ($test4ID == $expected) {
        $result = "Passed.";
    }
    echo "TEST 5: " . $result . "\n";
}
catch (Exception $e) {
    echo "TEST 5: FAILED.\n" . $e->getMessage();
}
