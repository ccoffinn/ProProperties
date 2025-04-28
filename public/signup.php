<?php
require "../src/common.php";

if (isset($_POST['submit'])) {
    require_once("../src/Tests.php");

    //Setting statement to null at first
    $statement = null;

    //Getting variables to test
    $firstName = escape($_POST['firstName']);
    $surname = escape($_POST['surname']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);

    //Using the test functions
    $firstNameValidation = testNames($firstName);
    $surnameValidation = testNames($surname);
    $emailValidation = testEmails($email);
    $passwordValidation = testPassword($password);

    //Checking test result
    if($firstNameValidation == false){
        $errormsg = "First Name invalid";
    }

    elseif($surnameValidation == false){
        $errormsg = "Surname invalid";
    }

    elseif($emailValidation == false){
        $errormsg = "Email invalid";
    }

    elseif($passwordValidation == false){
        $errormsg = "Password invalid";
    }

    else{
        try{
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
                "personID" => $personID,
                "AuthorizationID" => 1
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
}
    


if (isset($_POST['submit']) && $statement != null)
    header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <link rel="stylesheet" href="css/ProPropStyle.css">
    </head>

    <body>
    <header>
        <?php
        $pageTitle = "Signup";
        require 'templates/navbar.php';
        require "templates/header.php";?>
    </header>

    <main>
        <div class="contact-container">
            <!--Action for functionality (blank for now)-->
            <form action="" method="post" class="contact-form">
                <h2>Sign Up</h2>

                <?php if (!empty($errormsg)): ?>
                    <p class="error-text"><?php echo $errormsg; ?></p>
                <?php endif; ?>

    <main class="container my-5 d-flex justify-content-center align-items-center flex-grow-1">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Sign Up</h2>
            
                        <!--Action for functionality (blank for now)-->
            
                        <form action="" method="post">

                <!--First Name-->
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="form-control" required>
                            </div>
                <!--Surname-->
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" id="surname" name="surname" class="form-control" required>
                            </div>

                <!--Email-->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email" class="form-control" required>
                            </div>

                <!--Password-->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                <!--Submit Button-->
                            <div class="d-grid">
                                <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="mt-5">
        <?php require 'templates/footer.php'; ?>
    </footer>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>