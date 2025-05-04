<?php
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
       
<link rel="stylesheet" href="css/ProPropStyle.css">

<body class="d-flex flex-column min-vh-100 bg-light">
    <main class="flex-dill d-flex align-items-center justify-content-center">
        <div class="container my-5">
            <div class="card shadow-lg p-4">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Read Options</h2>

                    <div class="d-grid gap-3 col-6 mx-auto">
                        <a href="read-account.php" class="btn btn-primary btn-lg">Read Account</a>
                        <a href="read-property.php" class="btn btn-primary btn-lg">Read Property</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

        
<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

<footer class="mt-auto">
    <?php require 'templates/footer.php'; ?>
</footer>

</html>