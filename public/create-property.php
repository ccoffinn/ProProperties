<?php
require "../src/common.php";

if (isset($_POST['submit'])) {
    try {
    require_once '../src/DBconnect.php';

    //Creating a new address in address table
    $new_address = array(
        "line1" => escape($_POST['line1']),
        "line2" => escape($_POST['line2']),
        "line3" => escape($_POST['line3']),
        "countyCity" => escape($_POST['countyCity']),
        "eircode" => escape($_POST['eircode'])
        );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "address",
    implode(", ", array_keys($new_address)),
    ":" . implode(", :", array_keys($new_address)));

    $statement = $connection->prepare($sql);
    $statement->execute($new_address);

    //Get the newly created address's id
    $addressID = $connection->lastInsertId();

    //Creating a new property in property table
    $new_property = array(
        "price" => escape($_POST['price']),
        "beds" => escape($_POST['beds']),
        "baths" => escape($_POST['baths']),
        "footage" => escape($_POST['footage']),
        "energyRatingID" => escape($_POST['energyRatingID']),
        "addressID" => $addressID
        );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "property",
    implode(", ", array_keys($new_property)),
    ":" . implode(", :", array_keys($new_property)));

    $statement = $connection->prepare($sql);
    $statement->execute($new_property);
    
    } 

    catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['submit']) && $statement)
    header("Location: create.php");
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
        $pageTitle = "Create";
        require 'templates/adminNavbar.php';?>
    </header>

    <main>
        <div class="contact-container">
            <!--Action for functionality (blank for now)-->
            <form action="" method="post" class="contact-form">
                <h2>Create</h2>
                <!--Line 1-->
                <label>Line 1</label>
                <input type="text" name="line1" class="form-control" required>

                <!--Line 2-->
                <label>Line 2</label>
                <input type="text" name="line2" class="form-control" required>

                <!--Line 3-->
                <label>Line 3</label>
                <input type="text" name="line3" class="form-control">

                <!--County City-->
                <label>County City</label>
                <input type="text" name="countyCity" class="form-control" required>

                <!--Eircode-->
                <label>Eircode</label>
                <input type="text" name="eircode" class="form-control" required>

                <!--Price-->
                <label>Price</label>
                <input type="number" name="price" class="form-control" required>

                <!--Beds-->
                <label>Beds</label>
                <input type="number" name="beds" class="form-control" required>

                <!--Baths-->
                <label>Baths</label>
                <input type="number" name="baths" class="form-control" required>

                <!--Footage-->
                <label>Footage</label>
                <input type="number" name="footage" class="form-control" required>

                <!--Energy Rating-->
                <label>Energy Rating</label>
                <input type="number" name="energyRatingID" class="form-control" required>

                <!--Submit Button-->
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </main>

    <!-- Footer won't display correctly so i took it out -->

    </body>
</html>