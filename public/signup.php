<!--Reference: https://www.youtube.com/watch?v=VOqgoQCuJds-->
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
        $pageTitle = "Signup";
        require 'templates/header.php';
        require 'templates/navbar.php';
        ?>
    </header>

    <main>
        <div class="contact-container">
            <!--Action for functionality (blank for now)-->
            <form action="" class="contact-form">
                <h2>Sign Up</h2>
                <!--Email-->

                    <label>Email</label>
                    <input type="text" class="form-control" required>

                <!--Password-->
 
                    <label>Password</label>
                    <input type="password" class="form-control" required>

                <!--Submit Button-->
                <button type="submit">Sign up</button>
            </form>
        </div>
    </main>

    <footer>
        <?php require 'templates/footer.php'; ?>
    </footer>

    </body>
</html>