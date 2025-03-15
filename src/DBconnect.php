<?php
    // for establishing DB connection
    require_once 'DBconfig.php';

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        echo ' DB connected';
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
?>