<?php
require_once 'Screen.php';
require_once 'Connection.php';
require_once 'ScreenTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new ScreenTableGateway($connection);

$statement = $gateway->getScreenById($id);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="ScreenStyling.css"/>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
        <hr>
        <table>
            <h1>View Screen Details:</h1>
            <img src ="images/logo.jpg"
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<th>Name:</th>'
                    . '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Number of Exits:</th>'
                    . '<td>' . $row['numExits'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Number of Seats:</th>'
                    . '<td>' . $row['numSeats'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Date of next inspection:</th>'
                    . '<td>' . $row['dateNextInspection'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Projector Type:</th>'
                    . '<td>' . $row['projectorType'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <hr>
        <p>
            <a href="editScreenForm.php?id=<?php echo $row['id']; ?>">
                Edit Screen</a>
            <a class="deleteScreen" href="deleteScreen.php?id=<?php echo $row['id']; ?>">
                Delete Screen</a>
        </p>
    </body>
</html>