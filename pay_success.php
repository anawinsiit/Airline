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
    $succ = 0;

    
    $sql = ("INSERT INTO RESERVATION (customer_id,  flight_id,  fooddrink_id,   customer_amount,    caution,        seat_type,      price,          status) 
    VALUES (                        $user,      $flight_id, $food_drink,    $amount_customer,   '$caution' ,    '$seat_type',   $total_price,   'WAIT PAY');
        ");
    
    
    if ($conn->query($sql)) { 
        $succ = 1;
    
    }
    else{echo "Failed to connect to MySQL: $trans_id ".$conn -> error;}

        $conn->close();

    if ($succ){?>
        <div class="text-center pt-5" style="">
            <h2 class=" py-5 px-auto" style=""> Create a payment successfully</h2>
            
        </div>
    <?php } ?>

<div style="position: absolute; bottom: 0; width:100%;">
<?php
    
        include("footer.php");
?>
</div>