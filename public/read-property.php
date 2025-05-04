<?php
if (isset($_POST['submit'])) {
    try {
        require "../src/common.php";
        require_once '../src/DBconnect.php';
        $sql = "SELECT * FROM property WHERE ID = :ID";
        $id = $_POST['ID'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':ID', $id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
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
            <?php
            if (isset($_POST['submit'])) {
                if ($result && $statement->rowCount() > 0) {
            ?>
            <h2 class="text-center mb-4">Results</h2>
            <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
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
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        

        <?php } 
        
        else { ?>
            <p class="error-text">No results found for ID <?php echo escape($_POST['ID']); ?>.</p>
        <?php }
        } ?>

        <h2 class="text-center mt-5">Find property based on ID</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" class="mt-3">
                    <div class="mb-3">
                        <label for="ID" class="form-label">Property ID</label>
                        <input type="number" id="ID" name="ID" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">View Results</button>
                </form>
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
