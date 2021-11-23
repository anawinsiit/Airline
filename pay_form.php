<?php
include('includes/dbh.inc.php');
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    $user = $_SESSION['user_id'];   
    $reservation_id = $_POST['pay'];
    $detail = (" SELECT 
                reservation_id, fl.fligth_id, trans.trans_id, food.set_name, customer_amount,
                caution, seat_type, rs.price, rs.status, rs.date, 
                ap.airportname as dep, apo.airportname as ret, 
                fl.out_date as dep_date , fl.return_date as ret_date, 
                fl.time as st_time, fl.return_time as rt_time,
                fl.gate, fl.plane_code, trans.company, trans.type
                FROM reservation rs
                join flight fl on fl.fligth_id = rs.flight_id
                join airport ap on fl.initial = ap.airport_id
                join airport apo on fl.destination = apo.airport_id
                join fooddrink food on food.fooddrink_id = rs.fooddrink_id 
                left join transportation trans on rs.transportation_id = trans.trans_id
                WHERE customer_id = $user and reservation_id = $reservation_id
                order by rs.date
    ");
    $cuss = ("SELECT * FROM customer where customer_id = $user");
    $cus_detail = $conn->query($cuss);
    $cus_reserve =  $conn->query($detail);
    $result = mysqli_fetch_assoc($cus_detail);
    
    ?>
    
    <div class="container-fluid h-100">
                <div class="card align-items-center justify-content-center text-center">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2>
                                        <b>Payment Form</b>
                                    </h2>
                                    
                                </div>
                            </div>
                            <hr class="divider">
                            <div>
                                    <table>
                                        <?php
                                            if(!$cus_reserve -> num_rows){
                                                echo ' <td>No Data</td>';
                                            }
											else{
												echo '<tr>
														<th class="px-1 text-uppercase text-center border">Flight Detail</th>
														<th class="px-1 text-uppercase text-center border">car service</th>
														<th class="px-1 text-uppercase text-center border">FOOD</th>
														<th class="px-1 text-uppercase text-center border">#Passenger</th>
														<th class="px-1 text-uppercase text-center border">CAUTION</th>
														<th class="px-1 text-uppercase text-center border">SEAT<br/>TYPE</th>
														<th class="px-1 text-uppercase text-center border">price</th>
														<th class="px-1 text-uppercase text-center border">reservation<br/>date</th>
													</tr>';
                                                
												while($Rerserve_list=$cus_reserve->fetch_array()){ ?>
												<tr>
													<td class='px-1 border py-0'>
                                                        From <label class=" text-primary pt-1"> <?=$Rerserve_list['dep']?> </label> - To <label class=" text-primary pt-1"> <?=$Rerserve_list['ret']?> </label>
                                                        <br/>
                                                        Depart: <label class=" text-primary pt-1"> <?=$Rerserve_list['dep_date']?></label> - <?=$Rerserve_list['st_time']?>
                                                        , Return: <label class=" text-primary"> <?=$Rerserve_list['ret_date']?></label> - <?=$Rerserve_list['rt_time']?>
                                                        <br/>
                                                        Plane - <label class=" text-danger"> <?=$Rerserve_list['plane_code']?></label> , Gate - <label class=" text-danger"> <?=$Rerserve_list['gate']?></label>
                                                    </td>
													<td class='px-1 border'>
                                                        <?=$Rerserve_list['company']?>
                                                        <br/><label class=" text-success"><?=$Rerserve_list['type']?></label>
                                                    </td>
													<td class='px-1 border'>SET <label class=" text-danger"><?=$Rerserve_list['set_name']?></label></td>
													<td class='px-1 border'><?=$Rerserve_list['customer_amount']?></td>
													<td class='px-1 border'><?=$Rerserve_list['caution']?></td>
													<td class='px-1 border'><?=$Rerserve_list['seat_type']?></td>
													<td class='px-1 border'><?=$Rerserve_list['price']?> THB</td>
                                                    <td class='px-1 border'><?=$Rerserve_list['date']?></td>
                                                    
												</tr>                               
                                        <?php } }?>
                                    </table>
                            </div>
                            <hr class="divider">
                            <form action="pay.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="pt-1">Name
                                        <input type="text" value="<?= $result['fname'] ?> <?= $result['lname'] ?>" 
                                            name="name_user" readonly='readonly' class="form-control"> </label>
                                        <label class="pt-1">Telephone number
                                        <input type="text" value="<?= $result['telnum']?>" 
                                            name="telnum" readonly='readonly' class="form-control"> </label>
                                        <input type="text" value="<?= $reservation_id ?>" name="reservation_id" hidden readonly='readonly' class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="pt-1 text-bold">payment type</h4>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="promptpay" value="promptpay" required="required">
                                                <label class="form-check-label pr-4">Prompt Pay</label>
                                            <input class="form-check-input" type="radio" name="type" id="credit" value="credit" required="required">
                                                <label class="form-check-label pr-4">Credit Card</label>
                                            <input class="form-check-input" type="radio" name="type" id="debit" value="debit" required="required">
                                                <label class="form-check-label pr-4">Debit Card</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-3 justify-content-center">
                                    <button class="btn btn-block btn-sm btn-primary" type="submit" name="payment_comfirm" style="width:25%;">Confirm</button>
                                    <a href="editreservation.php" class="btn btn-danger" style="width:25%;">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
<div style="position: absolute; bottom: 0; width:100%;">
    <?php
        
            include("footer.php");
    ?>
    </div>
</body>