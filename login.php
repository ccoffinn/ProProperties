<!--Reference: https://www.youtube.com/watch?v=VOqgoQCuJds-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/login+signup.css">
    </head>

    <body>
    <header>
        <?php // TODO fix css for -> require 'navbar.php'; ?>
    </header>
    <main>
        <div class="container">
            <!--Action for functionality (blank for now)-->
            <form action="">
                <h1>Login</h1>
                <!--Email-->
                <div class="from-group">
                    <label>Email</label>
                    <input type="text" class="form-control" required>
                </div>
                <!--Password-->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" required>
                </div>
                <!--Submit Button-->
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </main>
    </body>

    <footer>
        <?php // TODO fix css for -> require 'footer.php'; ?>
    </footer>
</html>