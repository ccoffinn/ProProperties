<?php

require "../src/common.php";

if (isset($_POST['submit'])) {
    try {
        require_once '../src/DBconnect.php';
        $user =[
            "id" => escape($_POST['id']),
            "email" => escape($_POST['email']),
            "password" => escape($_POST['password']),
            "authorizationID" => escape($_POST['authorizationID'])
        ];
        
        $sql = "UPDATE account
                    SET email = :email,
                        password = :password,
                        authorizationID = :authorizationID
                WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($user);
    } 
    
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['id'])) {
    try {
        require_once '../src/DBconnect.php';
        $id = $_GET['id'];
        
        $sql = "SELECT id, email, password, authorizationID FROM account WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
        <body class="bg-light min-vh-100 d-flex flex-column">
            <?php require "templates/adminNavbar.php"; ?>

<<<<<<< Updated upstream:public/update-single-account.php
    <?php if (isset($_POST['submit']) && $statement) : ?>
        <?php echo "Account successfully updated" ?>
    <?php endif; ?>
=======
            <main class="container my-5 flex-grow-1">
                <?php if (isset($_POST['submit']) && $statement) : ?>
                    <div class="alert alert-success" role="alert">
                        User <?php echo escape($_POST['email']); ?> updated successfully!
                    </div>
            <?php endif; ?>
>>>>>>> Stashed changes:public/update-single.php

            <h2 class="mb-4">Edit a user</h2>

            <form method="post" class="needs-validation" novalidate>
                <div class="row g-3">
                    <?php foreach ($user as $key => $value) : ?>
                        <div class="col-md-6">
                        <label for="<?php echo $key; ?>" class="form-label"><?php echo ucfirst($key); ?></label>
                        <input type="text" class="form-control" name="<?php echo $key; ?>" id="<?php echo $key;?>" 
                        value="<?php echo escape($value); ?>" 
                        <?php echo ($key === 'id' ? 'readonly' : null); ?>>
                    <div class="invalid-feedback">
                        Please provide a valid <?php echo $key; ?>.
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-4">
            <button type="submit" name="submit" class="btn btn-primary">Update User</button>
        </div>
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

<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>