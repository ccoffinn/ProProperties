<?php
try {
    require "../src/common.php";
    require_once '../src/DBconnect.php';
    
    $sql = "SELECT * FROM property";
    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
    
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}



require 'templates/adminNavbar.php';

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
       
<main class="container mt-5">
    <h2 class="text-center mb-4">Update Properties</h2>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="table-responsive">
                <table class="table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th>Price</th>
                            <th>Beds</th>
                            <th>Baths</th>
                            <th>Footage</th>
                            <th>Energy Rating</th>
                            <th>Delete Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo escape($row["price"]); ?></td>
                            <td><?php echo escape($row["beds"]); ?></td>
                            <td><?php echo escape($row["baths"]); ?></td>
                            <td><?php echo escape($row["footage"]); ?></td>
                            <td><?php echo escape($row["energyRatingID"]); ?></td>
                            <td><a href="update-single-property.php?id=<?php echo escape($row["ID"]);
                            ?>">Update</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<footer>
    <?php require 'templates/footer.php'; ?>
</footer>
    
<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    </body>
</html>