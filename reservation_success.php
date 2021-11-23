<?php
include('includes/dbh.inc.php');
?>

<?php
require "header.php";
?>

<!DOCTYPE html>
<html lang="en">



<?php
    $user = $_SESSION['user_id'];
    $flight_id = $_SESSION['flight_id'];
    $trans_id = $_POST['trans_id'];
    $food_drink = $_POST['food_drink'];
    $amount_customer = $_POST['amount_customer'];
    $seat_type = $_POST['seat_type'];
    $caution = $_POST['caution'];
    $total_price = $_POST['total_price'];
    $succ = 0;

    if(!is_numeric($trans_id))
    {
        
        $sql = ("INSERT INTO RESERVATION (customer_id,  flight_id,  fooddrink_id,   customer_amount,    caution,        seat_type,      price,          status) 
        VALUES (                        $user,      $flight_id, $food_drink,    $amount_customer,   '$caution' ,    '$seat_type',   $total_price,   'WAIT PAY');
            ");
    }
    else{
        // settype($trans_id, "integer");
        $sql = ("INSERT INTO RESERVATION (  customer_id,    flight_id,  transportation_id,  fooddrink_id,   customer_amount,    caution,    seat_type,  price,          status) 
                                VALUES (    $user,          $flight_id, $trans_id,          $food_drink,    $amount_customer,   '$caution',   '$seat_type', $total_price,   'WAIT PAY');
                ");
    }
    
    if ($conn->query($sql)) { 
        $succ = 1;
    
    }
    else{echo "Failed to connect to MySQL: $trans_id ".$conn -> error;}

        $conn->close();

    if ($succ){?>
        <div class="text-center pt-5" style="">
            <h2 class=" py-5 px-auto" style=""> New Reservation created successfully </h2>
            
            <!-- <br> -->
            <a type="button" class="btn btn-dark text-center btn-lg" style="width:50%;" href="editreservation.php">Check here and Pay</a>
            
        </div>
    <?php } ?>

<div style="position: absolute; bottom: 0; width:100%;">
<?php
    
        include("footer.php");
?>
</div>