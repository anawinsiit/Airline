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
?>

<body>
    
    
<div class="container-fluid" style='background-color: white;'>
    <!-- <h3 class="text-center"><br>My Account Profile<br></h3>    -->
    <div class="booking-form">
    <form action="reservation.php" method="post">
        <div class="row">
                <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class=' text-center  pt-3'>Flight Information</h3>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class="pt-1">Destination</label>
                        <input type="text" value="<?= $result['Ori'] ?>" name="initial" readonly='readonly' class="form-control"> 
                    </div>
                    
                    <div class="col-md-6">
                    <label class="pt-1">Destination</label>
                        <input type="text" value="<?= $result['Dest']; ?>" name="Destination" readonly='readonly'class="form-control"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class="pt-1">Organization</label>
                        <input type="text" value="<?=  $result['Organization']; ?>" readonly='readonly'class="form-control"> 
                    </div>
                    <div class="col-md-6">
                    <label class="pt-1">Plane</label>
                        <input type="text" value="<?= $result['plane_code']; ?>" readonly='readonly'class="form-control"> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label class=" pt-1">Departure Date&Time</label>
                        <input type="text" value="<?= $result['out_date']?> - <?= $result['time']; ?>" readonly='readonly'class="form-control"> 
                    </div>
                    <div class="col-md-6">
                    <label class=" pt-1">Return Date&Time</label>
                        <input type="text" value="<?= $result['return_date']?> - <?= $result['return_time']; ?>" readonly='readonly'class="form-control"> 
                    </div>
                </div>
                <div class="row pt-1">
                    <div class="col-md-6">
                        <!-- <div class="row"> -->
                                <label class="pt-1">Seat type</label>
                                <br>
                                <div class='col-md-6'>
                                    <div class='form-check'>
                                        
                                            <input class='form-check-input' type="radio" name="seat_type" id="Economy" value="Economy" required="required" >
                                            <label>&nbsp Economy Class :<?= $result['price_eco'] * 2 ?> THB</label>
                                        
                    
                                    </div>
                                    <div class='form-check'>

                                            <input class='form-check-input' type="radio" name="seat_type" id="Bussiness"  value="Bussiness" Required > 
                                            <label>&nbsp Bussiness Class :<?= $result['price_bussi'] * 2; ?> THB </label>
                                    </div>
                                </div>
                        <!-- </div> -->
                    </div>
                    <div class="col-md-6">
                    <label class="">Amount Passengers</label>
                            <input type="number" value="1" class="form-control col-6" min="1" max="70" name='passenger'> 
                    
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 pl-3">
                        <label class="control-label">Food Set (FREE)</label><br>
                        <!-- <select name="Food" class="custom-select browser-default select" Required>
                            <option> Select Required </option> -->
                            <?php
                            while($row = $food_list -> fetch_array()){ ?>
                                <!-- echo '<option value="'.$row["fooddrink_id"].'"> SET '.$row["set_name"].' :  '.$row["main_course"].',
                                '.$row["side_dish"].' , '.$row["snack"].', '.$row["soft_drink"].'</option>'; -->
                                <div class="col-10 pl-4">
                                    <input class="form-check-input" type="radio" name="food_drink" id='<?=$row['fooddrink_id']?>' value=<?=$row['fooddrink_id']?> Required>
                                    <label class=''> SET <?= $row["set_name"] ?>: &nbsp <?= $row["main_course"] ?> , <?= $row["side_dish"] ?> ,<?= $row["snack"] ?> ,<?=$row["soft_drink"] ?> 
                                    </label>
                                </div>
                            
                                    
                            <?php } ?> 
                            
                            <!-- </option> -->
                        <!-- </select> -->
                    </div>
                    <div class="col-md-6">
                    <label class="">caution</label>
                        <input type="comment" name='caution' class="form-control"> 
                    </div>
                </div>
                <hr class="divider">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                            <div>
                                    <table class='text-center'>
                                    <h4 class="text-center">Transporatation Available</h4>
                                    <hr class="divider">
                                        <?php
                                            if(!$trans_list -> num_rows){
                                                echo ' <td>No Data</td>';
                                            }
											else{
                                                ?>
                                                <div class="row">
                                                    <div class='col-4'></div>
                                                    <div class='col-4'>
                                                    <h6 class=" border border-primary text-center">Do not want this service  &nbsp &nbsp &nbsp &nbsp   
                                                        <input class="form-check-input" type="radio" name="trans_id" id='0' value='NT' required="required"></h6>
                                                    </div>
                                                    <div class='col-4'></div>
                                                </div>
                                                <hr class="divider">
                                                <?php
												echo '<tr>
														<th class="pr-5">Company</th>
														<th class="pr-5">Type</th>
														<th class="pr-5">Max seat</th>
                                                        <th class="pr-5">Contact</th>
														<th class="pr-5">Special service</th>
														<th class="pr-5">Have toilet</th>
                                                        <th class="pr-5">Pet allow</th>
                                                        <th class="pr-5">Price</th>
													</tr>' ;
                                                    
                                                
												while($trans=$trans_list->fetch_array()){ ?>
												<tr>
													<td class='pr-5 pt-1'><?=$trans['company']?></td>
													<td class='pr-5 pt-1'><?=$trans['type']?></td>
													<td class='pr-5 pt-1'><?=$trans['max_seat']?></td>
													<td class='pr-5 pt-1'><?=$trans['contact']?></td>
													<td class='pr-5 pt-1'><?=$trans['special_service']?></td>
													<td class='pr-5 pt-1'><?=$trans['have_toilet'] ?></td>
                                                    <td class='pr-5 pt-1'><?=$trans['pet_allow'] ?></td>
                                                    <td class='pr-5 pt-1'><?=$trans['price']?></td>
													<td class='pr-5 pb-4'>
                                                        <input class="form-check-input" type="radio" name="trans_id" id='<?=$trans['trans_id']?>' 
                                                        value='<?=$trans['trans_id']?>'>
                                    
                                                    </td>
												</tr>                               
                                        <?php } }?>
                                    </table>
                            </div>
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
                
            <button type="submit" name="booking_submit" class="btn btn-dark btn-lg btn-block">Booking Flight</button>
                
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