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
    </head>

    <body>
    <header>
        <?php
        $pageTitle = "Login";
        require "templates/login_header.php";
        require 'templates/navbar.php';
        ?>
    </header>
    <main>
        <div class="contact-container">
            <!-- Action for functionality (blank for now) -->
            <form action="" method="post" class="contact-form">
                <h2>Login</h2>

                <!-- If the error msg isnt emtpy then display the error msg -->
                <?php if (!empty($errormsg)): ?>
                    <p class="error-text"><?php echo $errormsg; ?></p>
                <?php endif; ?>

                <!-- Email -->
                <label>Email</label>
                <input name="Email" type="email" class="form-control" required>

                <!-- Password -->
                <label>Password</label>
                <input name="Password" type="password" class="form-control" required>

                <!-- Submit Button -->
                <button type="submit" name="Submit">Login</button>

                <!-- Sign up link -->
                <p class="signup-text">Don't have an account? <a href="signup.php">Sign up here</a></p>
            </form>
        </div>
    </main>
    </body>

    <footer>
        <?php require 'templates/footer.php'; ?>
    </footer>
</html>
