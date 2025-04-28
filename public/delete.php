<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ProPropStyle.css">
</head>

<header>
    <?php require 'templates/adminNavbar.php'; ?>
</header>

<body>
       
<h2>Delete</h2>

    <h4><a href="delete-account.php">Delete Account</a></h4>
    <h4><a href="delete-property.php">Delete Property</a></h4>

    <!-- wont stick to bottom not sure why
        <footer>
        </h2/?php require 'templates/footer.php'; ?>
    </footer> -->

<body class="d-flex flex-column min-vh-100 bg-light">
    
    <main class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Update Users</h2>

                        <?php if (isset($success)) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $success; ?>
                            </div>
                        <?php } ?>
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Email Address</th>
                                    <th>Password</th>
                                    <th>Delete Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                                <tr>
                                    <td><?php echo escape($row["email"]); ?></td>
                                    <td><?php echo escape($row["password"]); ?></td>
                                    <td><a href="delete.php?id=<?php echo escape($row["ID"]);
                                    ?>">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <footer class="mt-auto">
        <?php require 'templates/footer.php'; ?>
    </footer>

    <!-- bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>