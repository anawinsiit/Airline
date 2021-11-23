<?php

session_start();


if(isset($_POST['delete'])) {

    require 'includes/dbh.inc.php';

    $user= $_SESSION['user_id'];
    $reservation_id = $_POST['delete'];

    $q="DELETE FROM reservation where reservation_id=$reservation_id";

    if(!$conn->query($q)){
    echo "DELETE failed. Error: ".$conn->error ;
    }
    $conn->close();
    header("Location: editreservation.php");
}
?>