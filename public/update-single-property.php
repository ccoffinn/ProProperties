<?php

require "../src/common.php";

if (isset($_POST['submit'])) {
    try {
        require_once '../src/DBconnect.php';
        $property = array(
            "id" => escape($_POST['id']),
            "price" => escape($_POST['price']),
            "beds" => escape($_POST['beds']),
            "baths" => escape($_POST['baths']),
            "footage" => escape($_POST['footage']),
            "energyRatingID" => escape($_POST['energyRatingID'])
            );
        
        $sql = "UPDATE property
                    SET price = :price,
                        beds = :beds,
                        baths = :baths,
                        footage = :footage,
                        energyRatingID = :energyRatingID
                WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($property);
    } 
    
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['id'])) {
    try {
        require_once '../src/DBconnect.php';
        $id = $_GET['id'];
        
        $sql = "SELECT id, price, beds, baths, footage, energyRatingID FROM property WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $property = $statement->fetch(PDO::FETCH_ASSOC);
    } 
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} 

else {
    echo "Something went wrong!";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Page</title>

    <link rel="stylesheet" href="css/ProPropStyle.css">
</head>
<body>
    <?php require "templates/adminNavbar.php"; ?>

    <?php if (isset($_POST['submit']) && $statement) : ?>
        <?php echo "Property successfully updated" ?>
    <?php endif; ?>

    <h2>Edit a property</h2>

    <form method="post">
        <?php foreach ($property as $key => $value) : ?>
            <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
            <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;?>" 
            value="<?php echo escape($value); ?>" 
            <?php echo ($key === 'id' ? 'readonly' : null); ?>>
        <?php endforeach; ?>
        <input type="submit" name="submit" value="Submit">
    </form>

    <!-- wont stick to the bottom
    <//?php require "templates/footer.php"; ?> -->

</body>
</html>