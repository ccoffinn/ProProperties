<?php
    require "../src/Property.php";
    require "../src/common.php";
    require "../src/Address.php";
    require "../src/EnergyRating.php";

    // check if value has been selected
    // if so, assign to array
    // if not assign empty array
    $beds = (isset($_POST['beds'])) ? $_POST['beds'] : array();
    $baths = (isset($_POST['baths'])) ? $_POST['baths'] : array();
    $ratings = (isset($_POST['ratings'])) ? $_POST['ratings'] : array();
    $prices = (isset($_POST['prices'])) ? $_POST['prices'] : array();
    $footages = (isset($_POST['footages'])) ? $_POST['footages'] : array();

    $attribute = ""; // string to be passed
    if (count($beds) > 0) {
        foreach ($beds as $bed) {
            $attribute .= "beds = " . $bed . " OR ";
        }
    }
    if (count($baths) > 0) {
        foreach ($baths as $bath) {
            $attribute .= "baths = " . $bath . " OR ";
        }
    }
    if (count($ratings) > 0) {
        foreach ($ratings as $rating) {
            $attribute .= "energyRatingID = " . $rating . " OR ";
        }
    }
    if (count($prices) > 0) {
        foreach ($prices as $price) {
            $attribute .= "price < " . $price . " OR ";
        }
    }
    if (count($footages) > 0) {
        foreach ($footages as $footage) {
            $attribute .= "footage > " . $footage . " OR ";
        }
    }

    // remove the last " OR " from string
    $attribute = substr($attribute, 0, -4);
    ?>

<!DOCTYPE html>
<head>
    <title>Test Page</title>
    <link rel="stylesheet" href="css/ProPropStyle.css">
    <link rel="stylesheet" type="text/css" href="css/searchBar.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
</head>

<body>

<header>

    <?php
    $pageTitle = "Listings";
    require 'templates/header.php';
    require 'templates/navbar.php';
    ?>
</header>

<main>

    <!-- display filters for listings -->
<div class ="tags">
    <form action ="filterListings.php" method ="post">
        <div class="filter">
            <label>Beds</label><br>
            <?php for ($i = 1; $i <= 6; $i++) { ?>
                <input type = "checkbox" name = "beds[]" value = "<?php echo $i; ?>"> <?php echo $i ?>
            <?php } ?>
        </div>
        <div class="filter">
            <label>Baths</label><br>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <input type = "checkbox" name = "baths[]" value = "<?php echo $i; ?>"> <?php echo $i ?>
            <?php } ?>
        </div>
        <div class="filter">
            <label>Energy Rating</label><br>
            <?php for ($i = 1; $i <= 6; $i++) { ?>
                <input type = "checkbox" name = "ratings[]" value = "<?php echo $i; ?>"> <?php echo EnergyRating::findByID($i) ?>
            <?php } ?>
        </div>
        <div class="filter">
            <label>Maximum Price</label><br>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
            <input type="radio" name = "prices[]" value="<?php echo ($i * 250000); ?>"> €<?php echo ($i * 250000) ?>
            <?php } ?>
        </div>
        <div class="filter">
            <label>Minimum Footage</label><br>
            <?php for ($i = 1; $i <= 4; $i++) { ?>
            <input type="radio" name="footages[]" value="<?php echo ($i * 40); ?>"> <?php echo ($i * 40) ?>m<sup>2</sup>
            <?php } ?>
        </div>
        <div class="submit">
            <button type = "submit">Submit</button>
        </div>
    </form>
</div>

<div class=listings>
    <!-- display by filters-->
    <?php
    $properties = Property::displayByAttribute($attribute);
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


