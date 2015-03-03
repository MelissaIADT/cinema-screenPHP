<?php

$id = session_id();
if ($id == ""){
    session_start();
}

//Deletes user information from the session array
$_SESSION['username'] = NULL;
unset($_SESSION['username']);

//Redirects user to login.php page
header("Location: login.php");