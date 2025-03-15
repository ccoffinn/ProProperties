<!--Reference: https://www.youtube.com/watch?v=VOqgoQCuJds-->
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
        <?php require 'navbar.php'; ?>
    </header>
    <main>
        <div class="contact-container">
            <!--Action for functionality (blank for now)-->
            <form action="" class= "contact-form">
                <h1>Login</h1>
                <!--Email-->

                    <label>Email</label>
                    <input type="text" class="form-control" required>

                <!--Password-->

                    <label>Password</label>
                    <input type="password" class="form-control" required>

                <!--Submit Button-->
                <button type="submit">Login</button>
            </form>
        </div>
    </main>
    </body>

    <footer>
        <?php require 'footer.php'; ?>
    </footer>
</html>