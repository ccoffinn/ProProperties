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
    //require 'header.php';
    require 'navbar.php';
    ?>
</header>

<main>
<!-- get sample data from json file -->
<?php
$housesJson = file_get_contents('C:\xampp\htdocs\ProProperties\json\houses.json');
$houses = json_decode($housesJson, true);

?>

<div class=listings>
    <!-- loop to display listings on home page -->
    <?php foreach ($houses as $house) { ?>
        <a href="ProductDescription.html">
        <div class=house>
            <div class="houseImage">
                <img src="/ProProperties/images/<?php echo $house['filename']; ?>" alt="Photo of House">
            </div>
            <h2 class="addressLine"><?php echo $house['address']; ?>, <?php echo $house['price'] ?></h2>
            <div class="line2">
                <h5><?php echo $house['beds']; ?> Beds</h5>
                <h5><?php echo $house['baths']; ?> Baths</h5>
                <h5><?php echo $house['squareFootage']; ?> m<sup>2</sup></h5>
            </div>
            <div class="line3">
                <h5>
                    <?php if ($house['energyRating']) {
                        echo "Strong Energy Rating";
                    }
                    else {
                        echo "Poor Energy Rating";
                    }?>
                </h5>
            </div>
        </div>
        </a>
    <?php } ?>
</div>
</main>

<footer>
    <?php require 'footer.php'; ?>
</footer>

</body>
