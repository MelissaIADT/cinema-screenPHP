<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="ScreenStyling.css"/>
            <meta charset="UTF-8">
            <title></title>
        </head>
            <body>
                <h1>Welcome to the Cinema!</h1>
                    <hr>
                        <img class = "display" src = "images/screen.jpg">
                    <hr>
                            
            <?php
             if(!isset($username)){
                $username = '';
            }
            ?>
                            
            <form action="checkLogin.php" method="POST">
                <table border="0">
                <tbody>
                    <tr>
                    <td>Username : </td>
                    <td>
                        <input type="text"
                               accept=""  
                               name="username"
                               value="<?php
                               if (isset($_POST) && isset($_POST['username'])) {
                                   echo $_POST['username'];
                               }
                               ?>" />
                        <span id="usernameError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['username'])) {
                                echo $errorMessage['username'];
                            }
                            ?>
                        </span>
                    </td>
                    </tr>
                    
                    <tr>
                    <td>Password : </td>
                    <td>
                        <input type="password" 
                               name="password" 
                               value="" />
                        <span id="passwordError" class="error">
                            <?php
                            if (isset($errorMessage) && isset($errorMessage['password'])) {
                                echo $errorMessage['password'];
                            }
                                ?>
                        </span>
                    </td>
                    </tr>
                    
                    <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="login" value="Login"/>
                        <input type="button"
                               value="Register"
                               name="register"
                               onclick="document.location.href = 'register.php'"/>
                        <input type="button" value="Forgot Password" name="forgot"/>
                    </tbody>
                </table>
            </form>
        </body>
</html> 