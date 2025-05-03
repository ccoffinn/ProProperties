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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

<header>

    <?php
    $pageTitle = "Listings";
    require 'templates/header.php';
    require 'templates/navbar.php';
    ?>
</header>

<!-- display filters for listings -->
<main class="container mt-5">
    <div class ="tags">
        <form action ="filterListings.php" method ="post">
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="beds" class="form-label">Beds</label><br>
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="bed-<?php echo $i; ?>" name="beds[]" value="<?php echo $i; ?>">
                            <label class="form-check-label" for="bed-<?php echo $i; ?>"><?php echo $i; ?> Beds </label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-3">
                    <label for="baths" class="form-label">Baths</label><br>
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="bath-<?php echo $i; ?>" name="baths[]" value="<?php echo $i; ?>">
                            <label class="form-check-label" for="bath-<?php echo $i; ?>">
                                <?php echo $i; ?> Baths
                            </label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-3">
                    <label for="ratings" class="form-label">Energy Rating</label><br>
                    <?php for ($i = 1; $i <= 6; $i++) { 
                        $rating = EnergyRating::findByID($i); 
                    ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rating-<?php echo $i; ?>" name="ratings[]" value="<?php echo $i; ?>">
                            <label class="form-check-label" for="rating-<?php echo $i; ?>">
                                <?php echo htmlspecialchars($rating); ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-3">
                    <label for="footages" class="form-label">Minimum Footage</label><br>
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="form-check">
                            <input type="radio" name="footages[]" value="<?php echo ($i * 40); ?>" class="form-check-input" id="footage-<?php echo ($i * 40); ?>">
                            <label class="form-check-label" for="footage-<?php echo ($i * 40); ?>"><?php echo ($i * 40); ?>m<sup>2</sup></label>
                        </div>
                    <?php } ?>
                </div>
            </div>

        <div class="submit">
            <button type = "submit">Submit</button>
        </div>
    </form>
</div>

    <!-- display by filters-->
     <div class="listings row mt-4">
        <?php
        $properties = Property::displayByAttribute($attribute);
        foreach ($properties as $property) {
            $address = Address::findByID($property['addressID']); // turn AddressID into string
        ?>

        <div class="col-md-4 mb-4">
            <a href="../toREMOVE/ProductDescription.html"> <!-- TODO add single property page with ID -->
                <div class=card>
                    <img src="images/house<?php echo $property['ID']?>.jpg" alt="Photo of a House" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $address->line1 . " €" . $property['price']; ?></h5>
                        <p class="card-text"><?php echo $address; ?></p>
                            <p class="card-text">
                                <?php echo $property['beds']; ?> Beds, 
                                <?php echo $property['baths']; ?> Baths, 
                                <?php echo $property['footage']; ?>m<sup>2</sup>, 
                                <strong><?php echo EnergyRating::findByID($property['energyRatingID']); ?></strong> Energy Rating
                            </p>
                        </div>
                    </div>
            </a>
        </div>
    <?php } ?>
</div>

</main>

<footer class="mt-auto">
    <?php require "templates/footer.php"; ?>
</footer>

<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>


