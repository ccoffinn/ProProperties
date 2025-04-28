<?php
require "../src/Account.php";

// Test 2 Account findByEmail
try {
    $expected = "admin@email.com"; // expected email
    $result = "Failed.";
    echo "TEST 2: Account Class findByEmail function.\n";
    echo "Expected output:\n";
    echo "admin@email.com admin John Doe admin \n";
    echo "Output: \n";
    $test2 = Account::findByEmail("admin@email.com");
    echo $test2 . "\n";

    if ($test2->email == $expected) {
        $result = "Passed.";
    }
    echo "TEST 2: " . $result . "\n";
}
catch (Exception $e) {
    echo "TEST 2: FAILED.\n" . $e->getMessage();
}
