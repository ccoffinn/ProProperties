<?php
require "../src/Person.php";

// Test 5 Property getPersonID
try {
    $expected = 1;
    $result = "Failed.";
    echo "TEST 5: Person Class getPersonID function.\n";
    echo "Expected output:\n";
    echo $expected . "\n";
    echo "Output: \n";
    $test5 = Person::findByID(1);
    $test5ID = $test5->getPersonId();
    echo $test5ID . "\n";

    if ($test5ID == $expected) {
        $result = "Passed.";
    }
    echo "TEST 5: " . $result . "\n";
}
catch (Exception $e) {
    echo "TEST 5: FAILED.\n" . $e->getMessage();
}