<?php

    require_once "person.php";

    $conor = new person();
    $conor->setName("Conor");
    $conor->setSurname("Shoebridge");
    $test1 = $conor->getName();
    $test2 = $conor->getSurname();

    $pdo = new PDO("mysql:host=localhost; dbname=proproperties", "root", "veggieSausages12");
    $sqlCreate = "insert into person (firstName, surname, addressID) values ('$test1', '$test2', null)";
    $create = $pdo->query($sqlCreate);

    ?>
