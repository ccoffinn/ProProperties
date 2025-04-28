<?php
require "../src/Property.php";

// Test 3 Property getAllProperties
try {
    $expected = 10; // 10 properties expected
    $result = "Failed.";
    echo "TEST 3: Property Class getAllProperties function.\n";
    echo "Expected output:\n";
    echo $expected . " Properties.\n";
    echo "Output:\n";
    $test3 = Property::getAllProperties();
    echo count($test3) . " Properties.\n";

    if (count($test3) == $expected) {
        $result = "Passed.";
    }
    echo "TEST 3: " . $result . "\n";
}
catch (Exception $e) {
    echo "TEST 3: FAILED.\n" . $e->getMessage();
}
