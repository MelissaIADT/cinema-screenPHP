<?php
require_once 'Screen.php';
require_once 'Connection.php';
require_once 'ScreenTableGateway.php';

require 'ensureUserLoggedIn.php';
 
$connection = Connection::getInstance();
$gateway = new ScreenTableGateway($connection);

$statement = $gateway->getScreens();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="ScreenStyling.css" />
        <script type ="text/javascript" src ="js/screen.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)){
        echo '<p>'.$message.'</p>';
        }
        ?>
       
        <?php
        $username = $_SESSION['username'];
        echo '<h2>Hello ' .$username. '!</h2>';
        ?>
        
        
        <hr>
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number of Exits</th>
                    <th>Number of Seats</th>
                    <th>Date of next Inspection</th>
                    <th>Type of Projector</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while($row){
                    echo '<tr>';
                    echo '<td>' .$row['name'] . '</td>';
                    echo '<td>' .$row['numExits'] . '</td>';
                    echo '<td>' .$row['numSeats'] . '</td>';
                    echo '<td>' .$row['dateNextInspection'] . '</td>';
                    echo '<td>' .$row['projectorType'] . '</td>';
                    echo '<td>'
                    . '<a href="viewScreen.php?id='.$row['id'].'">View</a> '
                    . '<a href="editScreenForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="deleteScreen" href="deleteScreen.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        
        <hr>
        
        
        <p><a href="createScreenForm.php">Create Screen</a></p>   
    </body>
</html>
