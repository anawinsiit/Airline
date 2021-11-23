<!DOCTYPE html>
<html lang="en">
    
<?php
require "includes/dbh.inc.php"
?>

    <?php
    if (isset($_SESSION['role'])){
    $role = $_SESSION['role'];}
    else{$role = 'guest';}
    // include('header.php');
    // include('navbar.php');
    ?>

<?php
    
    $query = (' SELECT plane.owner as Organization, AA.airportname as Ori , AB.airportname as Dest , 
                out_date, time, return_date, return_time, fl.plane_code , fl.fligth_id
                FROM flight as fl
                join plane on plane.plane_code = fl.plane_code
                join airport as AA on AA.airport_id = fl.initial
                join airport as AB on AB.airport_id = fl.destination;
                                    ');
    $flight_plan = $conn->query($query);

    //! เช็คเงื่อนไขจากการ Form ค้นหา
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //* ประกาศตัวแปร
        $Origin = $_POST["Origin"];
        $Destina = $_POST["Destina"];



		$query = (' SELECT plane.owner as Organization, AA.airportname as Ori , AB.airportname as Dest , 
                            out_date, time, return_date, return_time, fl.plane_code , fl.fligth_id
                            FROM flight as fl
                            join plane on plane.plane_code = fl.plane_code
                            join airport as AA on AA.airport_id = fl.initial
                            join airport as AB on AB.airport_id = fl.destination
                                        ');
        //! เช็คเงื่อนไขในการเรียกข้อมูล
        if (!empty($Origin) or !empty($Destina) ){
            $query .= "WHERE ";
            if (!empty($Origin) and !empty($Destina) )
            {
                $query .= " AA.airport_id = $Origin AND AB.airport_id = $Destina";
            }
            else if (!empty($Origin))
            {
                $query .= " AA.airport_id = $Origin ";
            }
            else if (!empty($Destina))
            {
                $query .= " AB.airport_id = $Destina ";
            }
        }
            $query .= ";";
            // if 
            $flight_plan = $conn->query($query);
    }
    if(isset($_GET['reservation'])) {   
        if($_GET['reservation'] == "success"){ 
        echo '<h5 class="bg-success text-center">Your reservation was successfull!</h5>';
    }
    }
?>

<body>
    
    
<div name = "site-booking">
        <header class="masthead">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                        <h3 class="text-black pt-3">Welcome to Klimax Airline</h3>
                        <hr class="divider my-4" />
                        <div class="col-md-12 mb-2 text-left">
                            <div class="card">
                                <div class="card-body">
                                <!-- //! กำหนดการส่งข้อมูล Form ไปตามตำแหน่งที่ Action ชี้ไป-->
                                    <form id="manage-filter" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <label for="" class="control-label">From</label>
                                                <select name="Origin" id="Origin" class="custom-select browser-default select">
                                                    <option value="0" select> ---- </option>
                                                    <?php
                                                    while($row = $airport_list -> fetch_array()){
                                                        echo '<option value="'.$row["airport_id"].'"> '.$row["airportname"].' , '.$row["location"].'</option>';
                                                    } 
                                                    ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <label for="" class="control-label">To</label>
                                                    <select name="Destina" id="Destina" class="custom-select browser-default select">
                                                        <option value="0" select> ---- </option>
                                                        <?php
														require 'includes/dbh.inc.php';
														while($depart_row = $airport_list -> fetch_array()){
															echo '<option value="'.$depart_row["airport_id"].'">'.$depart_row["airportname"].' , '.$depart_row["location"].'</option>';
														} 
														?>
                                                    </select>
                                                </div>
                                                
                                                

                                            </div>
                                            
                                            
                                                
                                                <div class="">
                                                    <button class="btn btn-block btn-sm btn-primary" type="submit"><i class="fa fa-plane"></i> Find Flights</button>
                                                </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </header>
            
        <section class="page-section" id="flight">
            <div class="container-fluid h-100">
                <div class="card align-items-center justify-content-center text-center">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h2>
                                        <b>Flights Available</b>
                                    </h2>
                                </div>
                            </div>
                            <hr class="divider">
                            <div>
                                    <table>
                                        <?php
                                            if(!$flight_plan -> num_rows){
                                                echo ' <td>No Data</td>';
                                            }
											else{
												echo '<tr>
														<th class="pr-5">Organization</th>
														<th class="pr-5">Plane</th>
														<th class="pr-5">Initial</th>
														<th class="pr-5">Destination</th>
														<th class="pr-5">Out Date</th>
														<th class="pr-5">Time</th>
														<th class="pr-5">Return</th>
														
													</tr>';
                                                
												while($Flight_list=$flight_plan->fetch_array()){ ?>
												<tr>
													<td class='pr-5'><?=$Flight_list['Organization']?></td>
													<td class='pr-5'><?=$Flight_list['plane_code']?></td>
													<td class='pr-5'><?=$Flight_list['Ori']?></td>
													<td class='pr-5'><?=$Flight_list['Dest']?></td>
													<td class='pr-5'><?=$Flight_list['out_date']?></td>
													<td class='pr-5'><?=$Flight_list['time']?></td>
													<td class='pr-5'><?=$Flight_list['return_date'],' ', $Flight_list['return_time'] ?></td>
													<!-- will do the booking.php -->
                                                    <?php if($role == 'customer'){ ?>
													<td>
                                                    <form action='includes/edit.php' method='POST'>
                                                        <td>
                                                            
                                                            <button  type='submit' name='flight_id' class='btn btn-primary btn-sm' value='<?=$Flight_list['fligth_id']?>'>
                                                            Select</button></td>
                                                    
                                                    </form>
                                                    </td>
                                                    <?php } ?>
												</tr>                               
                                        <?php } }?>
                                    </table>
                            </div>
                        </div>
                    </div>
                </dvi>
            </div>
        </section>
    </div>
</body>

</body>
</html>