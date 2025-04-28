<?php
    // install database using sql file
    require "DBconfig.php";
    try {
        $connection = new PDO("mysql:host=$host", $username, $password, $options);

        $sql = file_get_contents("../../data/init_ProProperties.sql");
        $connection->exec($sql);
        echo "DB Setup";
    }
    catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>
