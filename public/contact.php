<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/ProPropStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<!-- Navbar -->
<body>
<?php
$pageTitle = "Contact";
require 'templates/header.php';

if($_SESSION['Auth'] == 3){
    require 'templates/adminNavbar.php';
}

else{
    require 'templates/navbar.php';
}
?>

<!-- Contact form -->
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    
                <h2 class="text-center mb-4">Contact Us</h2>
                <h2 class="text-center mb-4">If you have any questions, feel free to send us a message.</h2>

                <form action="contact.php" method="post">
                    <!-- Inputs -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label">Message:</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
        <!-- PHP for sending messages -->
        <!-- Hours wasted here: 4 -->

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $to = "NazrinSqueaker@gmail.com";  // email for receiving customer messages
            $subject = "Contact Form Message";
            $message = "Name: " . $_POST["name"] . "\nEmail: " . $_POST["email"] . "\nMessage: " . $_POST["message"];
            $headers = "From: " . $_POST["email"];

            mail($to, $subject, $message, $headers);
            echo "Message sent successfully!";
        }
        ?>
    </div>
</main>

<!-- Footer -->
<footer class="mt-auto">
    <?php require 'templates/footer.php'; ?>
</footer>

<!-- bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
