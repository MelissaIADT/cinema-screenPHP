<?php
require_once 'Screen.php';
require_once 'Connection.php';
require_once 'ScreenTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$numExits = filter_input(INPUT_POST, 'numExits', FILTER_SANITIZE_STRING);
$numSeats = filter_input(INPUT_POST, 'numSeats', FILTER_SANITIZE_STRING);
$dateNextInspection = filter_input(INPUT_POST, 'dateNextInspection', FILTER_SANITIZE_STRING);
$projectorType = filter_input(INPUT_POST, 'projectorType', FILTER_SANITIZE_STRING);


$errorMessage = array();
if($name === FALSE || $name === ''){
    $errorMessage['name'] = 'Dont forget to fill in the name!<br/>';
}

if($numExits === FALSE || $numExits === ''){
    $errorMessage['numExits'] = 'Dont forget to fill in your number of exits!<br/>';
}

if($numSeats === FALSE || $numSeats === ''){
    $errorMessage['numSeats'] = 'Dont forget to fill in your number of seats!<br/>';
}

if($dateNextInspection === FALSE || $dateNextInspection === ''){
    $errorMessage['dateNextInspection'] = 'Dont forget to fill in date of the next inspection!<br/>';
}

if($projectorType === FALSE || $projectorType === ''){
    $errorMessage['projectorType'] = 'Dont forget to fill in the projector type!<br/>';
}

if(empty($errorMessage)){
    $connection = Connection::getInstance();
    $gateway = new ScreenTableGateway($connection);
    $id = $gateway->insertScreen($name, $numExits, $numSeats, $dateNextInspection, $projectorType);

//$message = "Screen created successfully";

    header('Location: home.php');
    }
    else
    {
        require 'createScreenForm.php';
    }
    