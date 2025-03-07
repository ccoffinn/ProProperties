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
<header>
    <?php require 'navbar.php';
    // require 'header.php';
    ?>
</header>

<!-- Contact form -->
<main>
    <div class="contact-container">
        <h2>Contact Us</h2>
        <h2>If you have any questions, feel free to send us a message.<h2>

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
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = ($_POST["name"]);
            $email = ($_POST["email"]);
            $message = ($_POST["message"]);

            // Message to confirm the message sent
            echo "<p class='success-message'>Thank you, $name! Your message has been received.</p>";
        }
        ?>
    </div>
</main>

<!-- Footer -->
<footer>
    <?php require 'footer.php'; ?>
</footer>
</body>
</html>
