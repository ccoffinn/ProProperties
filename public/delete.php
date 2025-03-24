<?php
require "../src/common.php";
if (isset($_GET["id"])) {
    try {
        require_once '../src/DBconnect.php';
        $id = $_GET["id"];
        $sql = "DELETE FROM account WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "User ". $id. " successfully deleted";
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

try {
    require_once '../src/DBconnect.php';
    $sql = "SELECT * FROM account";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} 

catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
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
       
<h2>Update Users</h2>
<table>
    <thead>
        <tr>
            <th>Email Address</th>
            <th>Password</th>
            <th>Delete Option</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($result as $row) { ?>
        <tr>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["password"]); ?></td>
            <td><a href="delete.php?id=<?php echo escape($row["ID"]);
            ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

    <!-- wont stick to bottom not sure why
        <footer>
        <//?php require 'templates/footer.php'; ?>
    </footer> -->

    </body>
</html>
