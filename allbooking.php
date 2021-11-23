<?php
require "includes/dbh.inc.php"
?>

<?php
require "header.php";
?>

<!DOCTYPE html>
<html lang="en">


<?php
    $user = $_SESSION['user_id'];
    $role = $_SESSION['role'];
    // $detail = ("SELECT * FROM reservation");
    $detail = ("    SELECT 
                    rs.customer_id,cs.username,reservation_id, fl.fligth_id, trans.trans_id, food.set_name, customer_amount,
                    caution, seat_type, rs.price, rs.status, rs.date, 
                    ap.airportname as dep, apo.airportname as ret, 
                    fl.out_date as dep_date , fl.return_date as ret_date, 
                    fl.time as st_time, fl.return_time as rt_time,
                    fl.gate, fl.plane_code, trans.company, trans.type
                    FROM reservation rs
                    join customer cs on cs.customer_id = rs.customer_id
                    join flight fl on fl.fligth_id = rs.flight_id
                    join airport ap on fl.initial = ap.airport_id
                    join airport apo on fl.destination = apo.airport_id
                    join fooddrink food on food.fooddrink_id = rs.fooddrink_id 
                    left join transportation trans on rs.transportation_id = trans.trans_id
                    order by rs.date DESC
    ");
    $cus_reserve =  $conn->query($detail);
?>


<body>
    
    
<div class="container-fluid h-100">
                <div class="card align-items-center justify-content-center text-center">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2>
                                        <b>All Reservation</b>
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
                                                        <th class="px-1 text-uppercase text-center border">Customer</th>
														<th class="px-1 text-uppercase text-center border">Flight Detail</th>
														<th class="px-1 text-uppercase text-center border">car service</th>
														<th class="px-1 text-uppercase text-center border">FOOD</th>
														<th class="px-1 text-uppercase text-center border">#Passenger</th>
														<th class="px-1 text-uppercase text-center border">CAUTION</th>
														<th class="px-1 text-uppercase text-center border">SEAT<br/>TYPE</th>
														<th class="px-1 text-uppercase text-center border">price</th>
                                                        <th class="px-1 text-uppercase text-center border">status</th>
														<th class="px-1 text-uppercase text-center border">reservation<br/>date</th>
													</tr>';
                                                
												while($Rerserve_list=$cus_reserve->fetch_array()){ ?>
												<tr>
                                                    <td class='px-1 border'>
                                                        <?=$Rerserve_list['username']?>
                                                    </td>
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
                                                    <td class='px-1 border'>
                                                        <?php
                                                            if ($Rerserve_list['status'] == "WAIT PAY"){echo "<label class='text-dark'>";}
                                                            else if ($Rerserve_list['status'] == "Cancel"){echo "<label class='text-danger'>";}
                                                            else if ($Rerserve_list['status'] == "Success"){echo "<label class='text-success'>";}
                                                            else if ($Rerserve_list['status'] == "Expired"){echo "<label class='text-secondary'>";}
                                                        ?>
                                                        <?=$Rerserve_list['status']?></label>
                                                    </td>
                                                    <td class='px-1 border'><?=$Rerserve_list['date']?></td>
                                                    <?php
                                                        if($role == 'admin'){ ?>
                                                            <?php if($Rerserve_list['status'] == "Cancel" or $Rerserve_list['status'] == "Expired"){ ?>
                                                            <td>
                                                            <form action='delete.php' method='POST'>
                                                                <button  type='submit' name='delete' 
                                                                class='btn btn-secondary btn-md px-4' value='<?=$Rerserve_list['reservation_id']?>'>
                                                                Delete</button>
                                                            </form>
                                                            </td>
                                                            <?php } ?>
                                                            <?php if($Rerserve_list['status'] == "WAIT PAY"){ ?>
                                                            <td>
                                                            <form action='cancel.php' method='POST'>
                                                                <button  type='submit' name='cancel' class='btn btn-danger btn-md px-4' value='<?=$Rerserve_list['reservation_id']?>'>
                                                                Cancel</button>
                                                            </form>
                                                            </td>
                                                            <?php } ?>
                                                    
                                                    <?php } ?>
                                                    
												</tr>                               
                                        <?php } }?>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
<?php
        include ("footer.php");
    ?>
</body>