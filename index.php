<!DOCTYPE html>
<head>
    <title>Test Page</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/searchBar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search">
</head>

<body>

<header>
    <div class="container">
        <!-- temp title -->
        <div class="logoTemp">
            <h1>ProProperties</h1>
        </div>
        <!--Action for functionality, empty for now-->
        <!--Search Bar Reference: https://www.youtube.com/watch?v=f6ocDCkCmhM -->
        <form action="">
            <div class="search">
                <span class="search-icon material-symbols-outlined">search</span>
                <!--Placeholder is default text for search bar-->
                <input class="search-input" type="search" placeholder="Search">
            </div>
        </form>
        <hr>
    </div>
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
            <img src="/images/<?php echo $house['filename']; ?>" class = houseImage alt="Photo of House">
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
    <hr>
    <h6>Copyright2025 ProProperties<sup>TM</sup></h6>
</footer>

</body>
