<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "edit_airline";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("Connection failed:" .mysqli_connect_error());
}

$updateu = $conn->query("SELECT * FROM customer");
$airport_list = $conn->query("SELECT * FROM airport");
$food_list = $conn->query("SELECT * FROM fooddrink");
$trans_list = $conn->query("SELECT * FROM transportation");
?>

