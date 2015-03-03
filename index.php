<?php
require_once 'Screen.php';
require_once 'Connection.php';
require_once 'ScreenTableGateway.php';

$id = session_id();
if ($id == ''){
    session_start();
}

$connection = Connection::getInstance();
$gateway = new ScreenTableGateway($connection);

$statement = $gateway->getScreens();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="ScreenStyling.css" />
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)){
        echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number of Exits</th>
                    <th>Number of Seats</th>
                    <th>Date of next Inspection</th>
                    <th>Type of Projector</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while($row){
                    echo '<tr>';
                    echo '<td>' .$row['name'] . '</td>';
                    echo '<td>' .$row['numSeats'] . '</td>';
                    echo '<td>' .$row['numExits'] . '</td>';
                    echo '<td>' .$row['dateNextInspection'] . '</td>';
                    echo '<td>' .$row['projectorType'] . '</td>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
