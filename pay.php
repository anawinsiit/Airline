


<?php

session_start();


if(isset($_POST['reservation_id'])) {

    require 'includes/dbh.inc.php';

    $user= $_SESSION['user_id'];
    $reservation_id = $_POST['reservation_id'];
    $type = $_POST['type'];

    $q = "INSERT INTO payment (customer_id, reservation_id, type) VALUES ($user, $reservation_id, '$type')";
    $update_res = "UPDATE reservation SET status='Success' where reservation_id=$reservation_id and customer_id=$user";

    if(!$conn->query($q)){
    echo "UPDATE failed. Error: ".$conn->error ;
    }
    else{
        require 'includes/dbh.inc.php';
        if(!$conn->query($update_res)){
            echo "UPDATE failed. Error: ".$conn->error ;
            }

    }
    $conn->close();
    header("Location: editreservation.php");
}
?>
<!-- </body> -->