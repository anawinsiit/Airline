<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">    <!--favicon-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="css/style.css" rel="stylesheet" type="text/css">     style.css document -->
<!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <!--bootstrap-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  googleapis jquery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>                          <!--bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>           <!--bootstrap-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>            <!--bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <title>Klimax Airline</title>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
.flex-column { 
       max-width : 260px;
   }
           
.container {
            background: #f9f9f9;
        }
      
.img {
            margin: 5px;
        }

.logo img{
    width:150px;
    height:250px;
	margin-top:90px;
	margin-bottom:40px;
}
</style>

<body>
 <!---navbar--->   
<nav class="navbar navbar-expand-lg" style="background-color: #B1DDF0;">
        <div class="container" style="background-color: #B1DDF0;">
            <a class="navbar-brand text-success" href='index.php'>
		        <b>Klimax Airline</b>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navi">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navi">
                <ul class="navbar-nav mr-auto">
                    
                    
                    <?php
                    //set navigation bar when logged in
                    if(isset($_SESSION['user_id'])){ echo'
                    <li class="nav-item">
                        <a class="nav-link " href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="food.php">Food&Transporatation</a>
                    </li>
                    
                    
                    '
                    ;
                    
                    if($_SESSION['role']=='customer') {   
                        echo'
                        <li class="nav-item">
                        <a class="nav-link" href="flight.php" >New Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editreservation.php" >Edit Reservations</a>
                        </li>';    
                        }

                    //set navigation bar when logged in and role of admin
                    if($_SESSION['role']=='admin' or $_SESSION['role']=='staff') {   
                    echo'
                    <li class="nav-item">
                        <a class="nav-link" href="flight.php" >View Flight</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allbooking.php" >All booking</a>
                    </li>';    
                    }
                    // <li class="nav-item">
                    //     <a class="nav-link" href="tables.php" >Update Total</a>
                    // </li>
                    }
                    //main page not logged in navigation bar
                    else { echo'
                    <li class="nav-item">
                        <a class="nav-link " href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="food.php">Food&Transporatation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="flight.php">Flight</a>
                    </li>
                    
                    '; } 
                    ?>
                    
                </ul>
                
                    <?php
                    //log out button when user is logged in
                    if(isset($_SESSION['user_id'])){
                    echo '
                    <form class="navbar-form navbar-right" action="edituser.php" method="post" style="padding-right: 20px;">
                    <button type="submit" name="logout-submit" class="btn btn-outline-dark"><i class="bi bi-person-circle"></i>&nbsp;My Account</button>
                    </form>
                    <form class="navbar-form navbar-right" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit" class="btn btn-outline-dark">Logout</button>
                    </form>';
                    }
                    else{  
                    echo '
                    <div>
                    <ul class="navbar-nav ml-auto">
                    <li><a class="nav-link bi bi-person-plus btn btn-light " data-toggle="modal" data-target="#myModal_reg">&nbsp;Register</a></li>
                    <li class="pl-1"><a class="nav-link bi bi-box-arrow-in-right btn btn-dark text-light" data-toggle="modal" data-target="#myModal_login">&nbsp;Login</a></li>
                    </ul> 
                    </div>
                    ';} 
                    ?>
            
            </div>
        </div>
</nav>

<div class="container">
    <!-- The Modal -->                          
    <div class="modal fade" id="myModal_login" >
        <div class="modal-dialog">
            <div class="modal-content" style = 'background-color: pink'>

            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

            <!-- Modal body -->
                <div class="modal-body" >
            
            <?php
            if(isset($_GET['error1'])){
        
            //script for modal to appear when error 
            echo '  <script>
                    $(document).ready(function(){
                    $("#myModal_login").modal("show");
                    });
                    </script> ';
        
        
            //error handling of log in
        
                    if($_GET['error1'] == "emptyfields") {   
                    echo '<h5 class="text-danger text-center">Fill all fields, Please try again!</h5>';
                    }
                    else if($_GET['error1'] == "error") {   
                    echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
                    }
                    else if($_GET['error1'] == "wrongpwd") {   
                        echo '<h5 class="text-danger text-center">Wrong Password, Please try again!</h5>';
                    }
                    else if($_GET['error1'] == "error2") {   
                        echo '<h5 class="text-danger text-center">Error Occured, Please try again!</h5>';
                    }
                    else if($_GET['error1'] == "nouser") {   
                        echo '<h5 class="text-danger text-center">Username or email not found, Please try again!</h5>';
                        }
                    }
                    echo'<br>';
                    ?>  
            
                    <div class="signin-form" >
                    <form action="includes/login.inc.php" method="post">
                        <p class="hint-text">If you have already an account please log in.</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mailuid" placeholder="Username Or Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login-submit" class="btn btn-success btn-lg btn-block">Log In</button>
                    </div>
                    <div class="form-group text-left">
                        <input type="radio" name="staff_admin" id="staff" value="1" required="required">Staff</input>
                        <input type="radio" name="staff_admin" id="admin" value="2" required="required">Admin</input>
                        <input type="radio" name="staff_admin" id="customer" value="3" required="required">Customer</input>
                    </div>
                    
                            </form>
                    </div>   
                    </div>
                <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div> 
</div>

    
<div class="container">
    <!-- The Modal -->
    <div class="modal fade" id="myModal_reg">
        <div class="modal-dialog">
            <div class="modal-content " style = 'background-color: pink'>
            <!-- Modal Header -->
                <div class="modal-header ">
                    <h4 class="modal-title " style=''>Register</h4>
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>      
            <!-- Modal body -->
                <div class="modal-body">   

                <?php
                if(isset($_GET['error'])){
                    //script for modal to appear when error 
                    echo '  <script>
                                $(document).ready(function(){
                                $("#myModal_reg").modal("show");
                                });
                            </script> ';


                    //error handling for errors and success --sign up form

                    if($_GET['error'] == "emptyfields") {   
                        echo '<h5 class="bg-danger text-center">Fill all fields, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "invalidemailusername") {   
                        echo '<h5 class="bg-danger text-center">Username or Email are taken!</h5>';
                    }
                    else if($_GET['error'] == "invalidemail") {   
                        echo '<h5 class="bg-danger text-center">Invalid Email, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "usernameemailtaken") {   
                        echo '<h5 class="bg-danger text-center">Username or email is taken, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "invalidusername") {   
                        echo '<h5 class="bg-danger text-center">Invalid Username, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "invalidpassword") {   
                        echo '<h5 class="bg-danger text-center">Invalid password, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "passworddontmatch") {   
                        echo '<h5 class="bg-danger text-center">Password must match, Please try again!</h5>';
                    }
                    else if($_GET['error'] == "error1") {   
                        echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                    }
                    else if($_GET['error'] == "error2") {   
                        echo '<h5 class="bg-danger text-center">Error Occured, Try again!</h5>';
                    }
                    else if($_GET['error'] == "phonenumbererror") {   
                        echo '<h5 class="bg-danger text-center">Invalid Phone number, Please try again!</h5>';
                    }
                    
                }
                if(isset($_GET['signup'])) { 
                        //script for modal to appear when success
                    echo '  <script>
                                $(document).ready(function(){
                                $("#myModal_reg").modal("show");
                                });
                            </script> ';

                    if($_GET['signup'] == "success"){ 
                        echo '<h5 class="bg-success text-center">Sign up was successfull! Please Log in!</h5>';
                    }
                }
                echo'<br>';
                ?>
    
    <!---sign up form -->
                    <div class="signup-form" >
                        <form action="includes/signup.inc.php" method="post" >
                            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="first" placeholder="First Name" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="last" placeholder="Last Name" required="required">
                            </div>
                            <div class="form-group">
                                    <input type="text" class="form-control" name="uid" placeholder="Username" required="required">
                                    <small class="form-text text-muted">Username must be 4-20 characters long</small>
                            </div>
                            <div class="form-group">
                                    <input type="email" class="form-control" name="mail" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" placeholder="Password" required="required">
                                <small class="form-text text-muted">Password must be 6-20 characters long</small>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd-repeat" placeholder="Confirm Password" required="required">
                            </div>  
                            <div class="form-group">
                                <input type="text" class="form-control" name="telnum" placeholder="Telnum" required="required">
                            </div>     
                            <div class="form-check">
                                <!-- <div class="form-check"> -->
                                <input name="gender" id="male" type="radio" value='Male'>
                                <label class="form-check-label">Male</label>
                                
                                <input name="gender" id="female" type="radio" value='Female'>
                                <label class="form-check-label">Female</label>
                                <br>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup-submit" class="btn btn-primary btn-lg btn-block">Register Now</button>
                            </div>
                        </form>
                            <!-- <div class="text-center">Already have an account? <a href="#">Sign in</a></div> -->
                    </div> 	
                </div>        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> 
            </div>
        </div>
    </div>
</div>

