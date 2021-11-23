<?php
include('includes/dbh.inc.php');
?>

<?php
require "header.php";
?>


<?php
$user = $_SESSION['user_id'];
$role = $_SESSION['role'];
if ($role == 'customer'){
    $sql = mysqli_query($conn, "select * from customer where customer_id='$user' ");
}
if ($role == 'staff'){
    $sql = mysqli_query($conn, "select * from staff where staff_id='$user' ");
}
if ($role == 'admin'){
    $sql = mysqli_query($conn, "select * from admin where admin_id='$user' ");
}
$result = mysqli_fetch_assoc($sql);
?>
<body>
<div class="container-fluid" style='background-color: pink;'>
    <!-- <h3 class="text-center"><br>My Account Profile<br></h3>    -->
    <div class="row">
        <div class="col-2"></div>
        <div class="col-md-8">   
        <div class="signup-form">
        <form action="updateprofile.php" method="post">
            <h3 class='pt-2 text-center pb-2'>Contact Information</h3>
            <div class="form-group row"> <label class="col-2 col-form-label">Username</label>
                <div class="col-10">
                <input type="text" value="<?php echo $result['username']; ?>" readonly='readonly'class="form-control" name="uid" placeholder="Username" required='required'> 
                </div>
            </div>
            <div class="form-group row"> <label class="col-2 col-form-label">Email</label>
                <div class="col-10">
                <input type="email" value="<?php echo $result['email']; ?>" class="form-control" name="mail" placeholder="Email" required='required'> 
                </div>
            </div>
            <!-- <h3>Personal Information</h3> -->
            <div class="form-group row"> <label class="col-2 col-form-label">First Name</label>
                <div class="col-10">
                <input type="text" value="<?php echo $result['fname']; ?>" name="fname" class="form-control" placeholder="First name" required='required'> 
                </div>
                
            </div>
            <div class="form-group row"> <label class="col-2 col-form-label">Last Name</label>
                <div class="col-10">
                <input type="text" value="<?php echo $result['lname']; ?>" class="form-control" name="lname" placeholder="Last name" required='required'> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="" >
                <h6 class="">Gender</h6>
                <div class="form-check" value="<?php echo $result['gender']; ?>">
                    <!-- <div class="form-check"> -->
                    <input name="gender" id="male" type="radio" value='Male' required='required'>
                    <label class="form-check-label">Male</label>
                    
                    <input name="gender" id="female" type="radio" value='Female' required='required'>
                    <label class="form-check-label">Female</label>
                    <!-- </div> -->
                </div>
                </div>
                <div class="col-md-4" style="">
                <h6 class="">Date Of Birth</h6> 
                <input type="date" class="form-control" name="dob" id="dob" placeholder="date" value="<?php echo $result['dob']; ?>">
                </div>
                <div class="col-md-4" style="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="">
                <h6 class="">Religion</h6>
                <input type="text" class="form-control" name="religion" id="religion" required value="<?php echo $result['religion']; ?>">
                </div>
                <div class="col-md-4" style="">
                    <h6 class="">Nationality</h6>
                    <input type="text" class="form-control"  name="nationality" id="nationality" required value="<?php echo $result['nationality']; ?>">
                </div>
                <div class="col-md-4" style="">
                    <div class="form-group"><h6 class="">Telephone Number</h6>
                    <input type="text" class="form-control"  placeholder="(+66)" name="telnum" id="telnum" requried value="<?php echo $result['telnum']; ?>"></div>
                    
                </div>
                </div>
            
            </div>
            
            <div class="form-group">
            <button type="submit" name="update-submit" class="btn btn-dark btn-lg btn-block">Update Profile</button>
            </div>
        </form>
        </div>
        </div>
            <div class="col-2"></div>
    </div>
</div>

<?php
include( "footer.php");
?>

</body>


