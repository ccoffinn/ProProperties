<?php
require "../src/common.php";

if (isset($_POST['submit'])) {
    try {
    require_once '../src/DBconnect.php';

    //Creating a new person in person table
    $new_user = array(
        "firstName" => escape($_POST['firstName']),
        "surname" => escape($_POST['surname'])
        );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "person",
    implode(", ", array_keys($new_user)),
    ":" . implode(", :", array_keys($new_user)));

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);

    //Get the newly created person's id
    $personID = $connection->lastInsertId();

    //Creating a new account in account table
    $new_account = array(
        "email" => escape($_POST['email']),
        "password" => escape($_POST['password']),
        "personID" => $personID
        );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)", "account",
    implode(", ", array_keys($new_account)),
    ":" . implode(", :", array_keys($new_account)));

    $statement = $connection->prepare($sql);
    $statement->execute($new_account);
    
    } 

    catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['submit']) && $statement)
    header("Location: create.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Page</title>
        <link rel="stylesheet" href="css/ProPropStyle.css">
    </head>

    <body>
    <header>
        <?php
        $pageTitle = "Create";
        require 'templates/adminNavbar.php';?>
    </header>

    <main>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg p-4">
                        <h2 class="text-center mb-4">Create Account</h2>
                            <form action="" method="post" class="contact-form">
                                <!--First Name-->
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="firstName" required>
                                </div>

                                <!--Surname-->
                                <div class="mb-3">
                                    <label for="surname" class="form-label">Surame</label>
                                    <input type="text" name="surname" class="form-control" id="surname" required>
                                </div>

                                <!--Email-->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>

                                <!--Password-->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                
                                <!--Submit Button-->
                                <div class="d-grid gap-2">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>                               
                            </form>
                        </div>
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