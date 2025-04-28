<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Page</title>

    <link rel="stylesheet" href="css/ProPropStyle.css">
</head>

<header>
    <?php
    $pageTitle = "Create";
    require 'templates/adminNavbar.php';?>
</header>

<body>
       
<h2>Create</h2>

    <h4><a href="create-account.php">Create Account</a></h4>
    <h4><a href="create-property.php">Create Property</a></h4>

    <!-- wont stick to bottom not sure why
        <footer>
        </h2/?php require 'templates/footer.php'; ?>
    </footer> -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Page</title>
        <link rel="stylesheet" href="css/ProPropStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    </head>

    <body class="d-flex flex-column min-vh-100 bg-light">
        

    <main class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                    <!--Action for functionality (blank for now)-->
                        <form action="" method="post">
                        <h2 class="card-title text-center mb-4">Create</h2>
                        
                        <!--First Name-->
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="firstName" class="form-control" required>
                        </div>

                        <!--Surname-->
                        <div class="mb-3">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" name="surname" class="form-control" required>
                        </div>

                        <!--Email-->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <!--Password-->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <!--Submit Button-->
                        <div class="d-grid mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

    <footer class="mt-auto">
        <?php require 'templates/footer.php'; ?>
    </footer>

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    </body>
</html>