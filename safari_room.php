<?php
//This page is using the header file that stores information about the login status and the navbar.
require_once 'header.php';

//Allows users to get feedback from the form 
require_once 'bookings/booking_view.inc.php';
?>

<head>
    <title>Safari Room</title>
</head>


<?php

    //This calls the check_login_errors function from the login_view file. This outputs "Logged in successfully"
    check_login_errors();

    //If the user is logged in then show them the below form-->
    if(isset($_SESSION['user_id'])){
?>

    <h1><u>Safari Room</u></h1>
    <p>This room has a big double bed and a safari theme 2 bed so that you can feel like your living at the safari park! Not that far from the Zoos attractions. </p>

    <h1><u>Book this room</u></h1>
    <p>Please enter all the information asked below!</p>
    <div class="container">
    <div class="d-flex justify-content-center">
    <div class="hotel_form">
    <!--This form will perform the actions from the insertbooking.inc file-->
    <form action="bookings/InsertHotel.inc.php" method="post">
    <input type="hidden" name="room_id" value="Jungle room">
    <div class="col-10">
    <label for="Startdate" class="form-label"><b><u>Date of Arrival</u></b></label>
    <input type="date" name="Startdate" required>
    </div>
    <div class="col-9">
    <label for="StartTime" class="form-label"><b><u>Time of Arrival</u></b></label>
    <input type="time" name="StartTime" required>
    </div>
    <div class="col-10">
    <label for="Enddate" class="form-label"><b><u>Date of Departure</u></b></label>
    <input type="date" name="Enddate" required>
    </div>
    <div class="col-10">
    <label for="EndTime" class="form-label"><b><u>Time of Departure</u></b></label>
    <input type="time" name="EndTime"  required>
    <br>
    <br>
    <button type="submit" class="btn btn-success">Book room</button>
 </div>
    </div>
</form>

  



    <!---If the user isn't signed in then show them this-->
    <?php } else{
        ?>
     <!---The user will see this alert if they aren't logged in-->
     <div class="alert alert-danger" role="alert">
     Please login to book rooms: <a href="login.php" class="alert-link">Login</a>.
    </div>
     <!--Background image-->
     <div class="ticket_page">
    </div>
  <?php  }

    ?>
</body>
</html>