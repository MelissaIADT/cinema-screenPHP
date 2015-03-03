<?php

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/screen.js"></script>
        <link rel="stylesheet" type="text/css" href="ScreenStyling.css"/>
    </head>
    
        <body>
            <?php require 'toolbar.php' ?>
            <h1>Create Screen Form</h1>

            <hr>

            <form id="createScreenForm" name ="createScreenForm" action="createScreen.php" method="POST">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Name: </td>
                            <td>
                                <input type="text" name="name" value="" />
                                    <?php
                                    if(isset($_POST) && isset($_POST['name'])){
                                    echo $_POST['name'];
                                    }
                                    ?>
                                <span id="nameError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Number of Exits: </td>
                            <td>
                                <input type="text" name="numExits" value="" />
                                <span id="numExitsError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['numExits'])) {
                                    echo $errorMessage['numExits'];
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Number of Seats: </td>
                            <td>
                                <input type="text" name="numSeats" value="" />
                                <span id="numSeatsError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['numSeats'])) {
                                    echo $errorMessage['numSeats'];
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Date of Next Inspection: </td>
                            <td>
                                <input type="text" name="dateNextInspection" value="" />
                                <span id="dateNextInspectionError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['dateNextInspection'])) {
                                    echo $errorMessage['dateNextInspection'];
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Projector Type: </td>
                            <td>
                                <input type="text" name="projectorType" value="" />
                                <span id="projectorTypeError" class="error"></span>
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['projectorType'])) {
                                    echo $errorMessage['projectorType'];
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Create Screen" name="createScreen"/>
                            </td>
                            <img src ="images/film.jpg">
                        </tr>
                        
                    </tbody>
                </table>
            </center>
        </form>
    </body>
</html>