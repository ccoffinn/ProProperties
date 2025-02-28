<?php
    $pdo = new PDO("mysql:host=localhost; dbname=lab4testDB", "root", "veggieSausages12");
    $result = $pdo->query("SELECT * FROM testPerson");
    $rows = $result->fetchAll();

    echo nl2br("Data from test DB below \n");

    foreach ($rows as $row) {
        echo $row['ID'] . " ";
        echo $row['firstName'] . " ";
        echo $row['lastName'];
    }
    ?>