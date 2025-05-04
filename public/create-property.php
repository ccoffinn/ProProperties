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

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">Create Property</h2>
                    <form action="" method="post" class="row g-3">
 
                <!--Line 1-->
                <div class="col-md-6">
                    <label for="line1" class="form-label">Line 1</label>
                    <input type="text" name="line1" id="line1" class="form-control" required>
                </div>

                <!--Line 2-->
                <div class="col-md-6">
                    <label for="line2" class="form-label">Line 2</label>
                    <input type="text" name="line2" id="line2" class="form-control" required>
                </div>

                <!--Line 3-->
                <div class="col-md-6">
                    <label for="line3" class="form-label">Line 3</label>
                    <input type="text" name="line3" id="line3" class="form-control" required>
                </div>

                <!--County City-->
                <div class="col-md-6">
                    <label for="countyCity" class="form-label">County / City</label>
                    <input type="text" name="countyCity" id="countyCity" class="form-control" required>
                </div>

                <!--Eircode-->
                <div class="col-md-6">
                    <label for="eircode" class="form-label">Eircode</label>
                    <input type="text" name="eircode" id="eircode" class="form-control" required>
                </div>

                <!--Price-->
                <div class="col-md-6">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
                
                <!--Beds-->
                <div class="col-md-4">
                    <label for="beds" class="form-label">Beds</label>
                    <input type="number" name="beds" id="beds" class="form-control" required>
                </div>
                
                <!--Baths-->
                <div class="col-md-4">
                    <label for="baths" class="form-label">Baths</label>
                    <input type="number" name="baths" id="baths" class="form-control" required>
                </div>
                
                <!--Footage-->
                <div class="col-md-4">
                    <label for="footage" class="form-label">Footage</label>
                    <input type="number" name="footage" id="footage" class="form-control" required>
                </div>
                
                <!--Energy Rating-->
                <div class="col-md-6">
                    <label for="energyRating" class="form-label">Energy Rating</label>
                    <input type="number" name="energyRating" id="energyRating" class="form-control" required>
                </div>
                
                <!--Submit Button-->
                <div class="col-12 d-grid">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg mt-3">Submit</button>
            </form>
        </div>
    </main>

    <footer>
        <?php require 'templates/footer.php'; ?>
    </footer>

    <!-- bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>