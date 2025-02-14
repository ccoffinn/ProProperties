<!DOCTYPE html>
<head>
    <title>Test Page</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>

<header>
    <!-- temp title -->
    <h1>ProProperties</h1>
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
    <?php } ?>
</div>
</main>

<footer>
    <hr>
    <h6>Copyright2025 ProProperties<sup>TM</sup></h6>
</footer>

</body>
