<?php
//This page is using the header file that stores information about the login status and the navbar.
require_once 'header.php';

//Allows users to get feedback from the form 
require_once 'bookings/booking_view.inc.php';
?>

<head>
    <title>Tickets</title>
</head>


<?php

    //This calls the check_login_errors function from the login_view file. This outputs "Logged in successfully"
    check_login_errors();

    //If the user is logged in then show them the below form-->
    if(isset($_SESSION['user_id'])){
?>


    <h1><u>Book Tickets</u></h1>
    <p>Please enter all the information asked below!</p>
    <div class="container">
    <div class="d-flex justify-content-center">
    <div class="ticket_form">
    <!--This form will perform the actions from the insertbooking.inc file-->
    <form action="bookings/InsertTickets.inc.php" method="post">
    <div class="col-10">
    <label for="dates" class="form-label"><b><u>Date of when you want to visit the zoo</u></b></label>
    <input type="date" name="dates" required>
    </div>
    <div class="col-10">
    <label for="tTime" class="form-label"><b><u>Time of when you want to visit the zoo</u></b></label>
    <input type="time" name="tTime" required>
    </div>
    <div class="col-11">
    <label for="Duration" class="form-label"><b><u>The duration of your visit</u></b></label>
    <br>
    <input type="number" name="Duration" placeholder="1 day" required>
    <br>
    <div class="col-12">
    <label for="amount" class="form-label"><b><u>Amount of tickets needed</u></b></label>
    <br>
    <input type="number" name="amount" placeholder="1 ticket" required>
    <br>
 
    <button type="submit" class="btn btn-success">Book tickets</button>
 </div>
    </div>
</form>

  



    <!---If the user isn't signed in then show them this-->
    <?php } else{
        ?>
     <!---The user will see this alert if they aren't logged in-->
     <div class="alert alert-danger" role="alert">
     Please login to book tickets: <a href="login.php" class="alert-link">Login</a>.
    </div>
     <!--Background image-->
     <div class="ticket_page">
    </div>
  <?php  }

    ?>
</body>
</html>