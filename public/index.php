<!DOCTYPE html>
<head>
    <title>Test Page</title>
    <link rel="stylesheet" href="css/ProPropStyle.css">
    <link rel="stylesheet" type="text/css" href="css/searchBar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
</head>

<body>

<header>
    <?php
    require 'templates/header.php';
    require 'templates/navbar.php';
    ?>
</header>

<main>
<?php
    require "../src/common.php";
    require "../src/Property.php";
    require "../src/Address.php";
    require "../src/EnergyRating.php";
?>

<div class=listings>
    <!-- loop to display listings on home page -->
    <?php
    $properties = Property::getAllProperties();
    foreach ($properties as $property) {
        $address = Address::findByID($property['addressID']); // turn AddressID into string
        ?>
        <a href="../toREMOVE/ProductDescription.html">
        <div class=house>
            <div class="houseImage">
                <img src="" alt="Photo of House">
            </div>
            <h2 class="headLine"> <?php echo $address->line1 . " €" . $property['price'] ?></h2>
            <div class="addressLine">
                <h5><?php echo $address ?></h5>
            </div>
            <div class="propertyDetails">
                <h5><?php echo $property['beds']; ?> Beds <?php echo $property['baths']; ?> Baths <?php echo $property['footage']; ?>m<sup>2</sup> <strong><?php echo EnergyRating::findByID($property['energyRatingID']); ?></strong> Energy Rating</h5>
            </div>
        </div>
        </a>
    <?php } ?>
</div>
</main>

<footer>
    <?php require "templates/footer.php"; ?>
</footer>

</body>
