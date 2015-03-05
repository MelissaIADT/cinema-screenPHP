<?php
require_once 'Connection.php';
require_once 'MovieTableGateway.php';
require_once 'ScreenTableGateway.php';

$session_id = session_id();
if($sessionId == ""){
    session_start();
}

require 'ensureUserLoggedIn.php';

if(!isset($_GET) || !isset($_GET['id'])){
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$movieGateway = new MovieTableGateway($connection);
$gateway = new ScreenTableGateway($connection);

$movies = $movieGateway->getMovieById($id);
$screendb = $gateway->getScreenByMovieId($id);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/movie.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>View Movie Details</h2>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $movie = $movies->fetch(PDO::FETCH_ASSOC);
                echo '<tr>';
                echo '<td>Title</td>'
                . '<td>' . $movie['title'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Year Released</td>'
                . '<td>' . $movie['yearReleased'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Run Time</td>'
                . '<td>' . $movie['runTime'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Classification</td>'
                . '<td>' . $movie['classification'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Director</td>'
                . '<td>' . $movie['director'] . '</td>';
                echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editMovieForm.php?id=<?php echo $movie['id']; ?>">
                Edit Movie</a>
            <a class="deleteMovie" href="deleteMovie.php?id=<?php echo $movie['id']; ?>">
                Delete Movie</a>
        </p>
        <h3>Screens Assigned to <?php echo $movie['title']; ?></h3>
        <?php if ($screendb->rowCount() !== 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Year Released</th>
                    <th>Run Time</th>
                    <th>Classification</th>
                    <th>Director</th>
                </tr>
            </thead>
        <tbody>
            <?php 
            $row = $screendb->fetch(PDO::FETCH_ASSOC);
            while($row){
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $row['yearReleased'] . '</td>';
                echo '<td>' . $row['runTime'] . '</td>';
                echo '<td>' . $row['classification'] . '</td>';
                echo '<td>' . $row['director'] . '</td>';
                echo '<td>'
                . '<a href="viewScreen.php?id='.$row['id'].'"View></a>'
                . '<a href="editScreenForm.php?id='.$row['id'].'"Edit></a>'
                . '<a href="deleteScreen" href="deleteScreen.php?id='.$row['id'].'"Delete</a>'
                . '</td>';
                echo '</tr>';

                $row = $screendb->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            </tbody>
        </table>
        
        <?php } else { ?>
            <p>There are no screens assigned to this movie.</p>
        <?php } ?>
        <?php require 'footer.php'; ?>
    </body>
</html>