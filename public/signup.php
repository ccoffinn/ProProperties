<?php
require "../src/common.php";

if (isset($_POST['submit'])) {
    try {
    require_once '../src/DBconnect.php';

    //Creating a new person in person table
    $new_user = array(
        "firstName" => escape($_POST['firstName']),
        "surname" => escape($_POST['surname'])
        );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "person",
    implode(", ", array_keys($new_user)),
    ":" . implode(", :", array_keys($new_user)));

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);

    //Get the newly created person's id
    $personID = $connection->lastInsertId();

    //Creating a new account in account table
    $new_account = array(
        "email" => escape($_POST['email']),
        "password" => escape($_POST['password']),
        "personID" => $personID,
        "AuthorizationID" => 1
        );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "account",
    implode(", ", array_keys($new_account)),
    ":" . implode(", :", array_keys($new_account)));

    $statement = $connection->prepare($sql);
    $statement->execute($new_account);
    
    } 

    catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['submit']) && $statement)
    header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Page</title>
        <link rel="stylesheet" href="css/ProPropStyle.css">
    </head>

    <body>
    <header>
        <?php
        $pageTitle = "Signup";
        require 'templates/navbar.php';
        require "templates/header.php";?>
    </header>

    <main>
        <div class="contact-container">
            <!--Action for functionality (blank for now)-->
            <form action="" method="post" class="contact-form">
                <h2>Sign Up</h2>
                <!--First Name-->
                <label>First Name</label>
                <input type="text" name="firstName" class="form-control" required>

                <!--Surname-->
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" required>

                <!--Email-->
                <label>Email</label>
                <input type="text" name="email" class="form-control" required>

                <!--Password-->
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>

                <!--Submit Button-->
                <button type="submit" name="submit">Sign up</button>
            </form>
        </div>
    </main>

    <footer>
        <?php require 'templates/footer.php'; ?>
    </footer>

    </body>
</html>