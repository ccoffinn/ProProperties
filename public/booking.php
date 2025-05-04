<!--Reference: https://www.youtube.com/watch?v=VOqgoQCuJds-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="css/ProPropStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Navbar -->
    <header>
        <?php
        $pageTitle = "Booking";
        require 'templates/header.php';
        
        if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == 3){
            require 'templates/adminNavbar.php';
        }
    
        else{
            require 'templates/navbar.php';
        }
        ?>
    </header>

    <!-- Main Content -->
    <main class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-shadow">
                    <div class="card shadow">
                        <h2 class="text-center mb-4">Booking</h2>
                        <h4 class="text-center mb-4">Fill out the form below to schedule a booking.</h4>

                        <!--booking form-->
                        <form action="booking.php" method="POST">

                        <div class="mb-3 input-group">
                            <span class="input-group-text" id="firstName-label">First</span>
                            <input type="text" class="form-control" id="firstName" name="firstName" aria-label="First name" aria-describedby="firstName-label" required>
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-group-text" id="lastName-label">Last</span>
                            <input type="text" class="form-control" id="lastName" name="lastName" aria-label="Last name" aria-describedby="lastName-label" required>
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-group-text" id="email-label">@</span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" aria-label="Email" aria-describedby="email-label" required>
                        </div>

                            <div class="mb-3 input-group">
                                <span class="input-group-text" id="propertyId-label">Property ID</span>
                                <input type="text" class="form-control" id="property" name="property" aria-label="Property" aria-describedby="property-label" required>
                            </div>

                        <div class="mb-3 input-group">
                            <span class="input-group-text" id="date-label">📅</span>
                            <input type="date" class="form-control" id="date" name="date" aria-label="Date" aria-describedby="date-label" required>
                        </div>

                        <div class="mb-3 input-group">
                            <span class="input-group-text" id="time-label">⏰</span>
                            <input type="time" class="form-control" id="time" name="time" aria-label="Time" aria-describedby="time-label" required>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" name="addToBooking" class="btn btn-success">Create Viewing</button>
                        </div>
                    </form>


            

            <!-- Display the bookings (It's essentially a cart) -->
            <h2 class="text-center mt-5">Your Bookings</h2>
            <div class="mt-3">
                <?php
                if (isset($_SESSION['booking']) && count($_SESSION['booking']) > 0) {
                    echo "<ul>";
                    foreach ($_SESSION['booking'] as $index => $booking) {
                        echo "<li>Booking for: " . htmlspecialchars($booking['property']) . ", " . htmlspecialchars($booking['firstName']) . " " . htmlspecialchars($booking['lastName']) . " on " . htmlspecialchars($booking['date']) . " at " . htmlspecialchars($booking['time']) . "</li>";
                    }
                    echo "</ul>";
                    echo '<form method="POST"><button type="submit" name="submitBooking">Confirm Bookings</button></form>';
                } else {
                    echo "<h4>No bookings.</h4>";
                }
                ?>
            </div>
        </main>

    <!-- PHP for handling booking functionality -->
    <?php
    // Add to Booking functionality
    if (isset($_POST['addToBooking'])) {
        // Store form data into the session booking
        $newBooking = [
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'property' => $_POST['property'],
            'date' => $_POST['date'],
            'time' => $_POST['time'],
        ];

        // Initialize booking if it's not set
        if (!isset($_SESSION['booking'])) {
            $_SESSION['booking'] = [];
        }

        // Add booking to the booking list
        $_SESSION['booking'][] = $newBooking;
    }

    // Submit Booking functionality
    if (isset($_POST['submitBooking'])) {

        // Clear the booking list after submission
        unset($_SESSION['booking']);
        echo "<script>alert('Your bookings have been submitted!');</script>";
    }
    ?>

    <!-- Footer -->
    <footer class="mt-auto">
        <?php require 'templates/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>