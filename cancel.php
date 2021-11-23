<?php

session_start();


if(isset($_POST['cancel'])) {

    require 'includes/dbh.inc.php';

    $user= $_SESSION['user_id'];
    $reservation_id = $_POST['cancel'];
    $role = $_SESSION['role'];

    $q="UPDATE reservation SET status='Cancel' where reservation_id=$reservation_id";

    if(!$conn->query($q)){
    echo "UPDATE failed. Error: ".$conn->error ;
    }
    $conn->close();
    if($role == 'customer'){ header("Location: editreservation.php"); }
    else if($role == 'admin'){ header("Location: allbooking.php"); }
}
?>