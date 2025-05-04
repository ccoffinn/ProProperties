<?php
if (isset($_POST['submit'])) {
    try {
        require "../src/common.php";
        require_once '../src/DBconnect.php';
        $sql = "SELECT * FROM account WHERE email = :email";
        $email = $_POST['Email'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
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
        <main class="container my-5">

            <?php
            if (isset($_POST['submit'])) {
                if ($result && $statement->rowCount() > 0) {
            ?>

                <h2 class="mb-4 text-center">Results</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Email Address</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($result as $row) { ?>
                                    <tr>
                                        <td><?php echo escape($row["email"]); ?></td>
                                        <td><?php echo escape($row["password"]); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php } 
            
            else { ?>
                <p class="error-text">No results found for <?php echo escape($_POST['Email']); ?>.</p>
            <?php }
            } ?>

            <h2 class="mt-5 mb-3 text-center">Find user based on Email</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" class="row g-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="Email" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary">View Results</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>

    <footer>
        <?php require 'templates/footer.php'; ?>
    </footer>

    <!-- bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    </body>
</html>
