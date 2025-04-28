<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Page</title>

    <link rel="stylesheet" href="css/ProPropStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<header>
    <?php require 'templates/adminNavbar.php'; ?>
</header>
<body class="bg-light min-vh-100 d-flex flex-column">

    <main class="container my-5 flex-grow-1">
       

<h2>Update</h2>

    <h4><a href="update-account.php">Update Account</a></h4>
    <h4><a href="update-property.php">Update Property</a></h4>

    <!-- wont stick to bottom not sure why
        <footer>
        </h2/?php require 'templates/footer.php'; ?>
    </footer> -->

    </body>
</html>

        <h2 class="mb-4">Update Users</h2>

        <div class="table-responsive">
            <table class="table table-triped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Edit Option</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo escape($row["email"]); ?></td>
                        <td><?php echo escape($row["password"]); ?></td>
                        <td><a href="update-single.php?id=<?php echo escape($row["ID"]);
                        ?>" class="btn btn-sm btn-primary"></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
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

<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>
