<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="ScreenStyling.css"/>
    </head>
    <body>
        <h1>Register below!</h1>
        <hr>
        <?php
        if(!isset($username)){
            $username = "";
        }
        ?>
        
        <form name="registerForm" id="registerForm" action="checkRegister.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php
                                if(isset($_POST) && (isset($_POST['username'])))
                            ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if(isset($errorMessage) && isset($errorMessage['username'])){
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" value="<?php
                                if(isset($_POST) && (isset($_POST['password'])))
                            ?>" />
                            <span id="passwordError" class="error">
                                <?php
                                if(isset($errorMessage) && isset($errorMessage['password'])){
                                    echo $errorMessage['password'];
                                }
                                ?> 
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password: </td>
                        <td>
                            <input type="password" name="password2" value="<?php
                                if(isset($_POST) && (isset($_POST['password2'])))
                            ?>" />
                            <span id="password2Error">
                                <?php
                                if(isset($errorMessage) && isset($errorMessage['password2'])){
                                    echo $errorMessage['password2'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Register" name="register" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <script type="text/javascript" src="js/register.js"></script>
    </body>
</html>
