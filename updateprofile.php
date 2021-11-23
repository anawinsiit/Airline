<?php

session_start();


if(isset($_POST['update-submit'])) {//elenxw an exei bei sti selida mesw tou submit

    require 'includes/dbh.inc.php';

    $user= $_SESSION['user_id'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $uid= $_POST['uid'];
    $mail= $_POST['mail'];
    $gender= $_POST['gender'];
    $dob= $_POST['dob'];
    $date_of_birth = date('Y-m-d', strtotime($dob));
    $religion = $_POST['religion'];
    $nationality = $_POST['nationality'];
    $telnum = $_POST['telnum'];
    $role = $_SESSION['role'];
    

    if($role == "customer"){    $q="UPDATE customer SET fname='$fname', lname='$lname',username='$uid', email='$mail', gender='$gender',
                            dob = '" .$date_of_birth. "', religion='$religion', nationality= '$nationality', telnum = '$telnum' where customer_id='$user'"; }

    else if($role == "staff"){    $q="UPDATE staff SET fname='$fname', lname='$lname',username='$uid', email='$mail', gender='$gender',
        dob = '" .$date_of_birth. "', religion='$religion', nationality= '$nationality', telnum = '$telnum' where staff_id='$user'"; }

    else if($role == "admin"){    $q="UPDATE admin SET fname='$fname', lname='$lname',username='$uid', email='$mail', gender='$gender',
        dob = '" .$date_of_birth. "', religion='$religion', nationality= '$nationality', telnum = '$telnum' where admin_id='$user'"; }

    if(!$conn->query($q)){
    echo "UPDATE failed. Error: ".$conn->error ;
    }
    $conn->close();
    header("Location: index.php");
}
?>
    




