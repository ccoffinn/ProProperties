<?php
if (isset($_POST['submit'])) {
    try {
        require "../src/common.php";
        require_once '../src/DBconnect.php';
        $sql = "SELECT * FROM account WHERE email = :email";
        $email = $_POST['Email'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}


require 'templates/adminNavbar.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Results Page</title>

        <link rel="stylesheet" href="css/ProPropStyle.css">
    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            if ($result && $statement->rowCount() > 0) {
        ?>
            <h2>Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>Email Address</th>
                        <th>Password</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo escape($row["email"]); ?></td>
                        <td><?php echo escape($row["password"]); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } 
        
        else { ?>
            <p class="error-text">No results found for <?php echo escape($_POST['Email']); ?>.</p>
        <?php }
        } ?>

        <h2>Find user based on Email</h2>

        <form method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="Email" required>
            <input type="submit" name="submit" value="View Results">
        </form>

        <!-- wont stick to bottom not sure why
         <footer>
            <//?php require 'templates/footer.php'; ?>
        </footer> -->

    </body>
</html>
