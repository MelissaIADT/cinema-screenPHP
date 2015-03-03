<?php
$host = 'daneel';
$database = 'N00130962';
$user = 'N00130962';
$pass = 'N00130962';
$dsn = 'mysql:dbname='.$database.";host=".$host;

$connection = new PDO($dsn, $username, $pass);

$sqlQuery = 'SELECT * FROM users';

$statement = $connection->query($sqlQuery)
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if ($connection && $statement){
            echo '<table>';
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            while ($row){
                echo '<tr>';
                echo '<td>'. $row['id']. '</td>';
                echo '<td>'. $row['username']. '</td>';
                echo '<td>'. $row['pass']. '</td>';
                echo '<td>'. $row['role']. '</td>';
                echo '</table>';
            }
            
        }
        ?>
    </body>
</html>
