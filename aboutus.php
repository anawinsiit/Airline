<?php include ('header.php'); ?>


<body>
<div class="container-fluid" style='background-color:rgb(240,248,255);'>
    <div class="about-section text-center" style='background-color:rgb(240,248,255);'>
        <br>
        <h1>Company Information</h1>
        <br>
        <div class="row">
            <div class="col-md-6">
            <h2>Our Fleet</h2>
                <p>The current fleet consists of 13 ATR 72, 9 Airbus 320, and 3 Airbus 330-300</p>
                <strong><li style="font-size: 25px"> ATR 72</li></strong>
                <ul><p>The ATR 72 is a short-haul regional airliner with twin turboprop engines developed and manufactured in France and Italy. The number "72" comes from the aircraft's typical seating configuration in a passenger-carrying configuration, which can accommodate 72–78 passengers in a single-class configuration.</p></ul>
                <strong><li style="font-size: 25px"> Airbus 320</li></strong>
                <ul><p>The A320 aided in the introduction of fly-by-wire technology, side-stick controls, and cockpit standardization in commercial aircraft, so it becomes a short- and medium-haul workhorse for airlines all over the world. The A320 is 37.6 m (123 ft) long and can accommodate 150 to 186 passengers.</p></ul>
                <strong><li style="font-size: 25px"> Airbus 330-300</li></strong>
                <ul><p>The A330-300 is a twin-engine twin-aisle wide-body that can transport between 250 and 440 passengers and is versatile enough to give a variety of seating arrangements while maintaining high-quality comfort for everyone on board.</p></ul>
            </div>
            <div class="col-md-6 pb-2">
                <img src='image/ATR.png' width="400" height="250" alt=''>  
                <img src='image/A320.png' width="400" height="200" alt=''>
                <img src='image/A330.png' width="400" height="250" alt=''>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style='background-color:pink;'>
    <div class="col-md-12" style='background-color:  pink'>
        <br><br>
            <h2 class = 'text-center'>Vission & Mission</h2>
            <p class = 'text-center'>The following basic values are very important to us. They serve as a reminder of what we must strive for in order to be the best airline in the world.</p>
            <strong class = 'text-center'><li style="font-size: 25px"> Vission Statement</li></strong>
            <ul class = 'text-center'>To be the world's premier airline.</ul>
            <strong><li style="font-size: 25px" class = 'text-center'> Mission Statements</li></strong>
            <div class = 'text-center'>
                <p>1. Our company's primary philosophy is safety first, both in the air and on the ground.</p>
                <p>2. We always remember that our continued success is dependent on our passengers, so we pledge to provide them with the greatest products and services available.</p>
                <p>3. To attain the lowest cost so that everyone can fly with us.</p>
            </div>
        <h1 style="text-align:center">Our Team</h1>
        <p style="text-align:center"> This website is the part of the course CSS326, SEC5 GROUP 6</p>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="container2">
                    <h2>Mr.	Anawin	Mitsufuji</h2>
                    <h3>6222771816</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="container2">
                    <h2>Ms. Onnicha	Pakdeepong</h2>
                    <h3>6222782128</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="container2">
                    <h2>Ms. Supajitra Chatchawalvoradech</h2>
                    <h3>6222782490</h3>
                </div>
            </div>
        </div>
        
        
        <br>
    </div>
</div>


<div class="container-fluid">
    <div class="col-md-12">
        <br>
    <h2 class="text-center">CONTACT US</h2>
    <br>
    <div class="row">
        <div class="col-sm-5" >
        <p>Contact us and we'll get back to you within 24 hours.</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Phatumthani, Thailand</p>
        <p><span class="glyphicon glyphicon-phone"></span> +66 15444885</p>
        <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col-sm-7">
        <div class="row">
            <div class="col-sm-6 form-group">
            <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
            </div>
        </div>
        <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
        <div class="row">
            <div class="col-sm-12 form-group">
            <button class="btn btn-primary pull-right" type="submit">Send</button>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

<?php 
include('footer.php');
?>

</body>
</html>