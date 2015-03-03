<?php
require_once 'Screen.php';
require_once 'Connection.php';
require_once 'ScreenTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if(!isset($_GET) || !isset($_GET['id'])){
    die('Invalid request..');
}

$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new ScreenTableGateway($connection);

$statement = $gateway->getScreenById($id);
if($statement->rowCount() !== 1 ){
    die("Illegal request..");
}

$row = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type ="text/javascript" src ="js/screen.js"></script>
        <link rel="stylesheet" type="text/css" href="ScreenStyling.css"/>  
    </head>
    <body> 
        <?php require 'toolbar.php' ?>
        <hr>
        <h1>Edit Screen Form:</h1>
        <img src ="images/logo.jpg"/>
        <?php 
        if(isset($errorMessage)){
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id ="editScreenForm" name="editScreenForm" action="editScreen.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border ="0">
                <tbody>
                    <tr>
                        <th>Name: </th>
                        <td>
                            <input type="text" name="name" value="<?php
                            if(isset($_POST) && isset($_POST['name'])){
                                echo $_POST['name'];
                            }
                            else echo $row['name'];
                            ?>" />
                            <span id ="emailError" class="error">
                                <?php
                                if(isset($errorMessage) && isset($errorMessage['name'])){
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Number of Exits: </th>
                        <td>
                            <input type="text" name="numExits" value="<?php
                            if(isset($_POST) && isset($_POST['numExits'])){
                                echo $_POST['numExits'];
                            }
                            else echo $row['numExits'];
                            ?>" />
                            <span id="numExitsError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['numExits'])){
                                    echo $errorMessage['numExits'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Number of Seats: </th>
                        <td>
                            <input type="text" name="numSeats" value="<?php
                            if(isset($_POST) && isset($_POST['numSeats'])){
                                echo $_POST['numSeats'];
                            }
                            else echo $row['numSeats'];
                            ?>" />
                            <span id="numSeatsError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['numSeats'])){
                                    echo $errorMessage['numSeats'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Date of next Inspection: </th>
                        <td>
                            <input type="text" name="dateNextInspection" value="<?php
                            if(isset($_POST) && isset($_POST['dateNextInspection'])){
                                echo $_POST['dateNextInspection'];
                            }
                            else echo $row['dateNextInspection'];
                            ?>" />
                            <span id="dateNextInspectionError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['dateNextInspection'])){
                                    echo $errorMessage['dateNextInspection'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Projector Type: </th>
                        <td>
                            <input type="text" name="projectorType" value="<?php
                            if(isset($_POST) && isset($_POST['projectorType'])){
                                echo $_POST['projectorType'];
                            }
                            else echo $row['projectorType'];
                            ?>" />
                            <span id="projectorTypeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['projectorType'])){
                                    echo $errorMessage['projectorType'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Screen" name="updateScreen" />
                            <script type="text/javascript" src ="js/register.js"></script>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr> 
        </form>
    </body>
</html>

