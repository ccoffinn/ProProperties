<?php
session_start();
require_once("../src/Account.php");

if (isset($_POST['Submit'])) {
    //Store submitted values from the login form
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    //Find the account based on email
    $account = Account::findByEmail($email);

    //Check if the account exists and if the password matches
    if ($account !== null && $password == $account->getPassword()){
        $_SESSION['Email'] = $account->getEmail(); //Store email to the session
        $_SESSION['Auth'] = $account->getAuthorizationId(); //Store auth to the session
        $_SESSION['Active'] = true; //For blocking access to webpages if not true

        // if($_SESSION['Auth'] == 3){
        //     header("Location: adminIndex.php");
        // }
        
        header("Location: index.php");
        
        exit;
    } 
    
    else{
        $errormsg = 'Incorrect Email or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/ProPropStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    </head>

    <body class="d-flex flex-column min-vh-100 bg-light">
    <header>
        <?php
        $pageTitle = "Login";
        require "templates/login_header.php";
        require 'templates/navbar.php';
        ?>
    </header>

    <main class="container my-5 d-flex justify-content-center align-items-center flex-grow-1">
        <div class="row w-100 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <!-- Action for functionality (blank for now) -->
                        <form action="" method="post" class="contact-form">
                        <h2 class="text-center mb-4">Login</h2>

                        <!-- If the error msg isnt emtpy then display the error msg -->
                        <?php if (!empty($errormsg)): ?>
                            <div class="alert alert-danger text-center"><?php echo $errormsg; ?></div>
                        <?php endif; ?>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="Email" type="email" class="form-control" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="Password" type="password" class="form-control" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" name="Submit" class="btn btn-warning">Login</button>
                        </div>

                        <!-- Sign up link -->
                        <p class="text-center">Don't have an account? <a href="signup.php">Sign up here</a></p>
                    
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="mt-auto">
        <?php require 'templates/footer.php'; ?>
    </footer>
    
    <!-- Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
