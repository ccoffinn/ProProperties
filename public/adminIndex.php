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
    require 'templates/adminNavbar.php';
    ?>
</header>

<main class="container my-5">
<?php
    require "../src/common.php";
    require "../src/Property.php";
    require "../src/Address.php";
    require "../src/EnergyRating.php";
?>

    <!-- display filters for listings -->
    <div class ="row mb-5">
        <div class="row md-4">
            <div class="card shadow">
                <div class="card-body">
                
                <form action ="filterListings.php" method ="post">

                <!-- filter for beds-->
                <div class="mb-3">
                    <label class="form-label">Beds</label><br>

                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="beds[]" value= "<?php echo $i?>"> id="beds<?php echo $i ?>">
                            <label class="form-check-label" for="beds<?php echo $i; ?>"><?php echo $i; ?></label>
                        </div>
                    <?php } ?>
                </div>

                <!-- filter for baths-->
                <div class="mb-3">
                    <label class="form-label">Baths</label><br>
                    
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name ="baths[]" value= "<?php echo $i; ?>"> id="baths<?php echo $i ?>">
                            <label class="form-check-label" for="baths<?php echp $i; ?>"><?php echo $i; ?></label>
                        </div>
                    <?php } ?>
                </div>

                <!-- filter for energy rating-->
                <div class="mb-3">
                    <label class="form-label">Energy Rating</label><br>
                    
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name ="ratings[]" value= "<?php echo $i; ?>"> id="ratings<?php echo $i ?>">
                            <label class="form-check-label" for="ratings<?php echp $i; ?>"><?php echo $i; ?></label>
                        </div>
                    <?php } ?>
                </div>

                <!-- filter for price-->
                <div class="mb-3">
                    <label class="form-label">Maximum Price</label><br>
                    
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name ="prices[]" value= "<?php echo $i; ?>"> id="baths<?php echo $i ?>">
                            <label class="form-check-label" for="prices<?php echp $i; ?>"><?php echo $i; ?></label>
                        </div>
                    <?php } ?>
                </div>

                <!-- filter for footage-->
                <div class="mb-4">
                    <label class="form-label">Minimum Footage</label><br>
                    
                    <?php for ($i = 1; $i <= 4; $i++) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name ="footages[]" value= "<?php echo $i; ?>"> id="baths<?php echo $i ?>">
                            <label class="form-check-label" for="footages<?php echp $i; ?>"><?php echo $i; ?></label>
                        </div>
                    <?php } ?>
                </div>

                <!-- submit button-->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <div class=col-md-8>
            <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- loop to display listings on home page -->
                <?php
                $properties = Property::getAllProperties();
                foreach ($properties as $property) {
                    $address = Address::findByID($property['addressID']); // turn AddressID into string
                    ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <a href="../toREMOVE/ProductDescription.html"> <!-- TODO add single property page with ID -->
                                <div class="card-body">
                                <div class="houseImage">
                                <img src="" class="card-img-top" alt="Photo of House">
                                    <h5 class="card-title"><?php echo htmlspecialchars($address->line1) . " - €" . htmlspecialchars($property['price']); ?></h5>
                                    <p class="card-text">
                                    <p class="card-text">
                                        <?php echo htmlspecialchars($address); ?><br>
                                        <?php echo htmlspecialchars($property['beds']); ?> Beds |
                                        <?php echo htmlspecialchars($property['baths']); ?> Baths |
                                        <?php echo htmlspecialchars($property['footage']); ?>m<sup>2</sup> |
                                        Energy: <strong><?php echo htmlspecialchars(EnergyRating::findByID($property['energyRatingID'])); ?></strong>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<footer class="mt-auto">
    <?php require "templates/footer.php"; ?>
</footer>

<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
