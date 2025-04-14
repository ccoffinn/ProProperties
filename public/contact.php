<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/ProPropStyle.css">
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
<main>
    <div class="contact-container">
        <h2>Contact Us</h2>
        <h2>If you have any questions, feel free to send us a message.</h2>

        <form action="contact.php" method="post" class="contact-form">
            <!-- Inputs -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Send Message</button>
        </form>

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
<footer>
    <?php require 'templates/footer.php'; ?>
</footer>
</body>
</html>
