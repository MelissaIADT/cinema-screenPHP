<?php
require_once 'Screen.php';
require_once 'Connection.php';
require_once 'ScreenTableGateway.php';

$id = session_id();
if($id == ""){
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ScreenTableGateway($connection);

$id = $_POST['id'];
$name = $_POST['name'];
$numExits = $_POST['numExits'];
$numSeats = $_POST['numSeats'];
$dateNextInspection = $_POST['dateNextInspection'];
$projectorType = $_POST['projectorType'];

$gateway->updateScreen ($id, $name, $numExits, $numSeats, $dateNextInspection, $projectorType);

header('Location: home.php');
        