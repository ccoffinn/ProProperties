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
            <?php $pageTitle = "Booking";
            require 'templates/navbar.php';
            require 'templates/header.php';?>
        </header>

        <main>
        <div class="contact-container">
            <!--Action for functionality (blank for now)-->
            <form action="" class="contact-form">
                <h2>Booking</h2>

                <!--First Name-->
                    <label>First Name</label>
                    <input type="text" class="form-control" required>

                <!--Last Name-->
                    <label>Last Name</label>
                    <input type="text" class="form-control" required>

                <!--Email-->
                    <label>Email</label>
                    <input type="text" class="form-control" required>

                <!--Date-->
                    <label>Date</label>
                    <input type="date" class="form-control" required>

                <!--Time-->
                    <label>Time</label>
                    <input type="time" class="form-control" required>

                <!--Submit Button-->
                <button type="submit">Submit</button>
            </form>
        </div>
        </main>

        
    </body>

    <footer>
        <?php require 'templates/footer.php'; ?>
    </footer>

</html>