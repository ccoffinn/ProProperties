<!--Reference: https://www.youtube.com/watch?v=VOqgoQCuJds--> 
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="css/ProPropStyle.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <?php
        $pageTitle = "Booking";
        require 'templates/navbar.php';
        require 'templates/header.php';
        ?>
    </header>

    <!-- Main Content -->
    <main>
        <div class="contact-container">
            <h2>Booking</h2>
            <h4>Fill out the form below to schedule a booking.</h4>

            <!-- Booking Form -->
            <form action="" method="POST" class="contact-form">
                <!-- Inputs -->
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>

                <button type="submit" name="addToBooking">Book viewing</button>
            </form>

            <!-- Display the bookings (It's essentially a cart) -->
            <h2>Your Bookings</h2>
            <?php
            if (isset($_SESSION['booking']) && count($_SESSION['booking']) > 0) {
                echo "<ul>";
                foreach ($_SESSION['booking'] as $index => $booking) {
                    echo "<li>Booking for: " . htmlspecialchars($booking['firstName']) . " " . htmlspecialchars($booking['lastName']) . " on " . htmlspecialchars($booking['date']) . " at " . htmlspecialchars($booking['time']) . "</li>";
                }
                echo "</ul>";
                echo '<form method="POST"><button type="submit" name="submitBooking">Submit Booking</button></form>';
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
    <footer>
        <?php require 'templates/footer.php'; ?>
    </footer>
</body>
</html>
