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
    $pageTitle = "Home";
    require 'templates/header.php';

    if($_SESSION['Auth'] == 3){
        require 'templates/adminNavbar.php';
    }

    else{
        require 'templates/navbar.php';
    }

    
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
<div class ="tags">
    <form action ="filterListings.php" method ="post">
        <div class="row">
            <div class="col-md-2">
                <label for="beds" class="form-label">Beds</label><br>
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                        <div class="form-check">
                            <label class="form-check-label" fpr="bed-<?php echo $i; ?>">
                                <input type="checkbox" class="form-check-input" id="bed-<?php echo $i; ?>" name="beds[]" value="<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-2">
                    <label for="baths" class="form-label">Baths</label><br>
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="form-check">
                            <label class="form-check-label" for="bath-<?php echo $i; ?>">
                                <input type="checkbox" class="form-check-input" id="bath-<?php echo $i; ?>" name="baths[]" value="<?php echo $i; ?>"> <?php echo $i ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-2">
                    <label for="ratings" class="form-label">Energy Rating</label><br>
                    <?php for ($i = 1; $i <= 6; $i++) {
                        $rating = EnergyRating::findByID($i);
                    ?>
                        <div class="form-check">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" id="rating-<?php echo $i; ?>" name="ratings[]" value="<?php echo $i; ?>"> <?php echo htmlspecialchars($rating); ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-2">
                    <label for="footages" class="form-label">Minimum Footage</label><br>
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="form-check">
                            <input type="radio" name="footages[]" value="<?php echo ($i * 40); ?>" class="form-check-input" id="footage-<?php echo ($i * 40); ?>">
                            <label class="form-check-label" for="footage-<?php echo ($i * 40); ?>"><?php echo ($i * 40); ?>m<sup>2</sup></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="listings mt-4">
    <div class="row">
    <!-- loop to display listings on home page -->
        <?php
        $properties = Property::getAllProperties();
        foreach ($properties as $property) {
            $address = Address::findByID($property['addressID']); // turn AddressID into string
            ?>
            <div class="col-md-4">
                <a href="../toREMOVE/ProductDescription.html"> <!-- TODO add single property page with ID -->
                    <div class="col mb-4">
                        <img src="" class="card-img-top" alt="Photo of House">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $address->line1 . " €" . $property['price'] ?></h2>
                            <p class="card-text">
                                <small class="text-muted"><?php echo $address ?></small>
                                <br>
                                <h5><?php echo $property['beds']; ?> Beds <?php echo $property['baths']; ?> Baths <?php echo $property['footage']; ?>m<sup>2</sup> <strong><?php echo EnergyRating::findByID($property['energyRatingID']); ?></strong> Energy Rating</h5>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
</main>

<footer class="mt-auto">
    <?php require "templates/footer.php"; ?>
</footer>

<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
