<!--Reference: https://www.youtube.com/watch?v=VOqgoQCuJds-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/booking.css">
    </head>

    <body>
        <header>
            <?php // TODO fix css for -> require 'navbar.php'; ?>
        </header>

        <main>
        <div class="container">
            <!--Action for functionality (blank for now)-->
            <form action="">
                <h1>Booking</h1>

                <!--First Name-->
                <div class="from-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" required>
                </div>

                <!--Last Name-->
                <div class="from-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" required>
                </div>

                <!--Email-->
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" required>
                </div>

                <!--Date-->
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" required>
                </div>

                <!--Time-->
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" class="form-control" required>
                </div>

                <!--Submit Button-->
                <input type="submit" class="btn" value="Submit">
            </form>
        </div>
        </main>
    </body>

    <footer>
        <?php // TODO fix css for -> require 'footer.php'; ?>
    </footer>

</html>