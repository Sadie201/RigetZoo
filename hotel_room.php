
<?php
//This page is using the header file that stores information about the login status and the navbar.
require_once 'header.php';

//Allows users to get feedback from the form - activity_logged_successfully
require_once 'bookings/booking_view.inc.php';


?>

<head>
    <title>Hotel rooms</title>
</head>


<?php

    //This calls the check_login_errors function from the login_view file. This outputs "Logged in successfully"
    check_login_errors();

    //If the user is logged in then show them the below forms-->
    if(isset($_SESSION['user_id'])){
?>
        <h1><u>Hotel Room</u></h1>

       


        <!---Card of rooms starts-->
    <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <!---Safari room-->
      <img src="images/SafariRoom.jpeg" class="card-img-top" alt="Safari room 2 beds">
      <div class="card-body">
        <h5 class="card-title">Safari room</h5>
        <p class="card-text">This room can facilitate for 4 people as it has 2 bedrooms with one room having a joint room.</p>
        <a href="safari_room.php" class="btn btn-primary">Reserve</a>
      </div>
    </div>
  </div>
  <!--Luxury room-->
  <div class="col">
    <div class="card h-100">
      <img src="images/LuxuryRoom.jpg" class="card-img-top" alt="Room with a nice double bed. ">
      <div class="card-body">
        <h5 class="card-title">Luxury Room</h5>
        <p class="card-text">This room has 2 rooms, perfect for all families. This hotel room is perfect for little ones with a kid bedroom included!</p>
        <a href="Luxury_room.php" class="btn btn-primary">Reserve</a>
      </div>
    </div>
  </div>
  <!---Big family room-->
  <div class="col">
    <div class="card h-100">
      <img src="images/KidsBed.jpg" class="card-img-top" alt="A bed that has patterns.">
      <div class="card-body">
        <h5 class="card-title">Room for the family!</h5>
        <p class="card-text">This is room is perfect for the family to get away and relax! It has 4 bedrooms, 2 of which caters to children!</p>
        <a href="family_room.php" class="btn btn-primary">Reserve</a>
      </div>



   



    <!---If the user isn't signed in then show them this-->
    <?php } else{
        ?>
         <h1><u>Hotel Room</u></h1>
     <!---The user will see this alert if they aren't logged in-->
     <div class="alert alert-danger" role="alert">
     You can have a look at our rooms but you can't book any unless you login: <a href="login.php" class="alert-link">Login</a>.
    </div>
      
    <!--Card starts here-->
        <!--Card starts here-->
        <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <!---Safari room-->
      <img src="images/SafariRoom.jpeg" class="card-img-top" alt="Safari room 2 beds">
      <div class="card-body">
        <h5 class="card-title">Safari room</h5>
        <p class="card-text">This room can facilitate for 4 people as it has 2 bedrooms with one room having a joint room.</p>
      </div>
    </div>
  </div>
  <!--Luxury room-->
  <div class="col">
    <div class="card h-100">
      <img src="images/LuxuryRoom.jpg" class="card-img-top" alt="Room with a nice double bed. ">
      <div class="card-body">
        <h5 class="card-title">Luxury Room</h5>
        <p class="card-text">This room has 2 rooms, perfect for all families. This hotel room is perfect for little ones with a kid bedroom included!</p>
      </div>
    </div>
  </div>
  <!---Big family room-->
  <div class="col">
    <div class="card h-100">
      <img src="images/KidsBed.jpg" class="card-img-top" alt="A bed that has patterns.">
      <div class="card-body">
        <h5 class="card-title">Room for the family!</h5>
        <p class="card-text">This is room is perfect for the family to get away and relax! It has 4 bedrooms, 2 of which caters to children!</p>
      </div>
  </div>
</div>
  <?php  }

    ?>
</body>
</html>