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
    $pageTitle = "Home";
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

    <!-- display filters for listings -->
<div class ="filters">
    <form action ="filterListings.php" method ="post">
        <div>
            <label>Beds</label>
            <?php for ($i = 1; $i <= 6; $i++) { ?>
                <input type = "checkbox" name = "beds[]" value = "<?php echo $i?>"> <?php echo $i ?>
            <?php } ?>
        </div>
        <div>
            <label>Baths</label>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <input type = "checkbox" name = "baths[]" value = "<?php echo $i; ?>"> <?php echo $i ?>
            <?php } ?>
        </div>
        <div>
            <label>Energy Rating</label>
            <?php for ($i = 1; $i <= 6; $i++) { ?>
                <input type = "checkbox" name = "ratings[]" value = "<?php echo $i; ?>"> <?php echo EnergyRating::findByID($i) ?>
            <?php } ?>
        </div>
        <div>
            <label>Maximum Price</label>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <input type="radio" name = "prices[]" value="<?php echo ($i * 250000); ?>"> €<?php echo ($i * 250000) ?>
            <?php } ?>
        </div>
        <div>
            <label>Minimum Footage</label>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <input type="radio" name="footages[]" value="<?php echo ($i * 40); ?>"> <?php echo ($i * 40) ?>m<sup>2</sup>
            <?php } ?>
        </div>
        <div>
            <button type = "submit">Submit</button>
        </div>
    </form>
</div>

<div class=listings>
    <!-- loop to display listings on home page -->
    <?php
    $properties = Property::getAllProperties();
    foreach ($properties as $property) {
        $address = Address::findByID($property['addressID']); // turn AddressID into string
        ?>
        <a href="../toREMOVE/ProductDescription.html"> <!-- TODO add single property page with ID -->
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
