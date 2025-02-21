<!DOCTYPE html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" href="">
</head>

<body>
<header>
    <?php
    //require 'header.php';
    require 'navbar.php';
    ?>
</header>

<main>
    <div style="padding: 20px; max-width: 600px; margin: auto; background-color: #F0EAD6;">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to send us a message.</p>

        <form action="contact.php" method="post" style="display: flex; flex-direction: column; height: 400px;">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required style="padding: 8px; margin-bottom: 10px;">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required style="padding: 8px; margin-bottom: 10px;">

            <label for="message">Message:</label>
            <textarea id="message" name="message" required style="padding: 8px; margin-bottom: 10px; height: 100px;"></textarea>

            <button type="submit" style="background-color: orange; color: white; padding: 10px; border: none; cursor: pointer;">Send Message</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = ($_POST["name"]);
            $email = ($_POST["email"]);
            $message = ($_POST["message"]);

            echo "<p style='color: green; margin-top: 10px;'>Thank you, $name! Your message has been received.</p>";
        }
        ?>
    </div>
</main>
</body>

<footer>
    <?php require 'footer.php'; ?>
</footer>