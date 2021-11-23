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
    $amount_customer = $_POST['passenger'];
    $seat_type = $_POST['seat_type'];
    $caution = $_POST['caution'];
    

    $sql = ("SELECT plane.owner as Organization, AA.airportname as Ori , AB.airportname as Dest , 
            out_date, time, return_date, return_time, fl.plane_code , fl.fligth_id, AA.airport_id as Ori_id, AB.airport_id as Dest_id,
            plane.price_eco, plane.price_bussi
            FROM flight as fl
            join plane on plane.plane_code = fl.plane_code
            join airport as AA on AA.airport_id = fl.initial
            join airport as AB on AB.airport_id = fl.destination
            Where fl.fligth_id = $flight_id;
            ");
    $flight_info = $conn->query($sql);
    $result = mysqli_fetch_assoc($flight_info);
    if($seat_type == 'Economy'){
        $price_seat = $result['price_eco'] * 2;
    }
    else{
        $price_seat = $result['price_bussi'] * 2;
    }

    if ($trans_id == "NT") {
            $trans_id = 'NOTUSE';
            $price_trans = 0;
            $company = "NOT USE";
            $type = '...';
        }
    else{
        $sql_tran = $conn -> query("SELECT * from transportation where trans_id = $trans_id ;");
        $res = mysqli_fetch_assoc($sql_tran);
            $price_trans = $res['price'];
            $company = $res['company'];
            $type =  $res['type'];
    }
?>

<body>
    
    
<div class="container-fluid" style='background-color: white;'>
    <!-- <h3 class="text-center"><br>My Account Profile<br></h3>    -->
    <div class="booking-form">
    <form action="reservation_success.php" method="post">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class=' text-center  pt-3'>Flight Information</h3>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class="pt-1">Initial</label>
                        <input type="text" value="<?= $result['Ori']; ?>" readonly class="form-control"> 
                        
                    </div>
                    
                    <div class="col-md-6">
                    <label class="pt-1">Destination</label>
                        <input type="text" value="<?= $result['Dest']; ?>" readonly class="form-control"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class="pt-1">Organization</label>
                        <input type="text" value="<?= $result['Organization']; ?>" readonly class="form-control"> 
                    </div>
                    <div class="col-md-6">
                    <label class="pt-1">Plane</label>
                        <input type="text" value="<?= $result['plane_code']; ?>" readonly class="form-control"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class=" pt-1">Departure Date&Time</label>
                        <input type="text" value="<?= $result['out_date']?> - <?= $result['time']; ?>" readonly class="form-control"> 
                    </div>
                    <div class="col-md-6">
                    <label class=" pt-1">Return Date&Time</label>
                        <input type="text" value="<?= $result['return_date']?> - <?= $result['return_time']; ?>" readonly class="form-control"> 

                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-6">
                    <label class=" pt-1">Seat type</label>
                        <input type="text" value="<?= $seat_type?>, <?= $price_seat ?> THB" name="" readonly  class="form-control">
                        <input type="text" value="<?= $seat_type?>" name="seat_type" hidden readonly  class="form-control">

                        
                    </div>
                    <div class="col-md-6">
                        <label class=" pt-1">Amount Passengers</label>
                        <input type="text" name="amount_customer" value="<?= $amount_customer?>" readonly class="form-control"> 
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 ">
                        <label class=" pt-1">Food Set</label>
                            <?php
                            if($food_drink == 1) {
                            echo '<input type="text" value="SET A" readonly class="form-control"> ';
                            } 
                            else if($food_drink == 2) {
                                echo '<input type="text" value="SET B" readonly class="form-control"> ';
                            } 
                            else if($food_drink==3) {
                                echo '<input type="text" value="SET C" readonly class="form-control"> ';
                            } ?>
                            <input type="text" name="food_drink" value="<?= $food_drink?>" hidden readonly class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <label class=" pt-1">Transporatation</label>
                        <input type="text" value="<?= $company ?> <?= $type ?> <?= $price_trans ?>THB" readonly class="form-control"> 
                        <input type="text" value="<?= $trans_id ?>" hidden name="trans_id" readonly class="form-control"> 
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-6">
                        <label class="pt-1">caution</label>
                        <input type="comment" name='caution' value="<?= $caution ?>" readonly  class="form-control"> 
                    </div>
                    <div class="col-md-6">
                        <label class="pt-1">Total Price</label>
                        <?php
                            $total_price = ($price_seat * $amount_customer) + $price_trans;
                        ?>
                        <input type="text" value="<?= $total_price?>" name='total_price' readonly  class="form-control" style="background-color: skyblue;"> 
                    </div>
                </div>
                
                        
            </div>
            <div class="col-md-1">
            </div>
            
        </div>
        <div class="row ">
            <div class="col-3"></div>
            <div class="form-group col-6">
                <br>
            <button type="submit" name="confirm_booking" class="btn btn-dark btn-lg btn-block">Confirm Data</button>
            </div>
            <div class="col-3">
            </div>
        </div>
        </form>
    </div>
</div>

<?php
require 'footer.php';
?>


</body>
</html>