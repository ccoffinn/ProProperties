<?php
require "../src/Address.php";

// Test 1 Address findByID
try {
    $expected = "398 Anderson Place"; // expected line1
    $result = "Failed.";
    echo "TEST 1: Address Class findByID function.\n";
    echo "Expected output:\n";
    echo "398 Anderson Place, Finglas,  Dublin 17, D17 F5P4\n";
    echo "Output: \n";
    $test1 = Address::findByID(1);
    echo $test1 . "\n";

    if ($test1->line1 == $expected) {
        $result = "Passed.";
    }
    echo "TEST 1: " . $result . "\n";
}
catch (Exception $e) {
    echo "TEST 1: Failed \n" . $e->getMessage();
}


