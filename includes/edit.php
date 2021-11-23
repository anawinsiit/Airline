<?php
session_start();

if(isset($_POST['flight_id'])) {
    require 'dbh.inc.php';
    $flight_id = $_POST['flight_id'];
    $_SESSION['flight_id'] = $_POST['flight_id'];
    header("Location: ../book_flight.php");
    // exit();
    // echo $_SESSION['reserv_id'];
    }
    
?>


