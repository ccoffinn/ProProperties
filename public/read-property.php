<?php
if (isset($_POST['submit'])) {
    try {
        require "../src/common.php";
        require_once '../src/DBconnect.php';
        $sql = "SELECT * FROM property WHERE ID = :ID";
        $id = $_POST['ID'];
        $statement = $connection->prepare($sql);
        $statement->bindParam(':ID', $id, PDO::PARAM_STR);
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
                    <th>Price</th>
                    <th>Beds</th>
                    <th>Baths</th>
                    <th>Footage</th>
                    <th>Energy Rating</th>
                    <th>Delete Option</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["price"]); ?></td>
                    <td><?php echo escape($row["beds"]); ?></td>
                    <td><?php echo escape($row["baths"]); ?></td>
                    <td><?php echo escape($row["footage"]); ?></td>
                    <td><?php echo escape($row["energyRatingID"]); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php } 
        
        else { ?>
            <p class="error-text">No results found for ID <?php echo escape($_POST['ID']); ?>.</p>
        <?php }
        } ?>

        <h2>Find property based on ID</h2>

        <form method="post">
            <label for="ID">Email</label>
            <input type="number" id="ID" name="ID" required>
            <input type="submit" name="submit" value="View Results">
        </form>

        <!-- wont stick to bottom not sure why
         <footer>
            <//?php require 'templates/footer.php'; ?>
        </footer> -->

    </body>
</html>
