<?php
    // for establishing DB connection
    require 'DBconfig.php';

    try {
        $connection = new PDO($dsn, $username, $password, $options);
    }
    catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
?>