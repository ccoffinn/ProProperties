<?php
require 'templates/adminNavbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Page</title>

<<<<<<< Updated upstream
    <link rel="stylesheet" href="css/ProPropStyle.css">
</head>
<body>
       
<h2>Read</h2>

    <h4><a href="read-account.php">Read Account</a></h4>
    <h4><a href="read-property.php">Read Property</a></h4>

    <!-- wont stick to bottom not sure why
        <footer>
        </h2/?php require 'templates/footer.php'; ?>
    </footer> -->
=======
        <link rel="stylesheet" href="css/ProPropStyle.css">
    </head>
    <body class="d-flex flex-column min-vh-100">

    <main class="container my-5">
        <?php
        if (isset($_POST['submit'])) {
            if ($result && $statement->rowCount() > 0) {
        ?>

            <h2 class="mb-4">Results</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
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

        <?php } else { ?>
            <div class="alert alert-warning" role="alert">
                No results found for <strong><?php echo escape($_POST['Email']); ?></strong>.
        <?php }
        } ?>

        <h2 class="mt-5 mb-3">Find user based on Email</h2>

        <form method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="Email" c;ass="form-control" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">View Results</button>
        </form>
    </main>

        <footer class="mt-auto">
            <?php require 'templates/footer.php'; ?>
        </footer>

        <script>
            // bootstrap form validation
            document.addEventListener('DOMContentLoaded', () => {
                const forms = document.querySelectorAll('.needs-validation);')

                forms.forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        });
        </script>
>>>>>>> Stashed changes

    </body>
</html>