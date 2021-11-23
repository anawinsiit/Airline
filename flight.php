<?php
require "header.php";
require "includes/dbh.inc.php"
?>

<div class="container-fluid">
    <!-- <h3 class="text-center"><br>Booking<br></h3>    -->
    <div class="row">
        <div class="col-md-12">   
<?php
if(!isset($_SESSION['user_id'])){
    echo '	<p class="text-center text-danger"><br>You are currently not logged in!<br></p>
            <p class="text-center">In order to make a reservation you have to create an account!<br><br><p>';  }
        include("flight_page.php");
    ?>
        </div>
    </div>
</div>
<?php
require "footer.php";
?>