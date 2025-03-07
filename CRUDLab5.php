<?php

// Simple CRUD operations for our DB

// create
$pdo = new PDO("mysql:host=localhost; dbname=proproperties", "root", "veggieSausages12");
$sqlCreate = "insert into person (firstName, surname, addressID) values ('Conor', 'Shoebridge', null)";
$create = $pdo->query($sqlCreate);

// read
$sqlRead = "select * from person where firstName='Conor'";
$read = $pdo->query($sqlRead);
$readResult = $read->fetchAll();
echo $readResult[0]["ID"] . " " . $readResult[0]["firstName"] . " " . $readResult[0]["surname"] . " " . $readResult[0]["addressID"];

// update
$sqlUpdate = "update person set firstName = 'Haris' where firstName='Conor'";
$update = $pdo->query($sqlUpdate);
$read2 = $pdo->query("select * from person where firstName='Haris'");
$readResult2 = $read2->fetchAll();
echo $readResult2[0]["ID"] . " " . $readResult2[0]["firstName"] . " " . $readResult2[0]["surname"] . " " . $readResult2[0]["addressID"];

// delete
$sqlDelete = "delete from person where firstName='Haris'";
$delete = $pdo->query($sqlDelete);
?>
