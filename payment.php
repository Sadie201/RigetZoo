<?php
//This page is using the header file that stores information about the login status and the navbar.
require_once 'header.php';


//Allows users to get feedback from the form 
require_once 'bookings/booking_view.inc.php';
?>

<head>
    <title>Payment Details</title>
</head>


<?php
    //This calls the check_login_errors function from the login_view file. This outputs "Logged in successfully"
    check_login_errors();

    //If the user is logged in then show them the below form-->
    if(isset($_SESSION['user_id'])){
?>



<h1><u>Payment Details</u></h1>
<p>To book our services, please fill out your details below. Once the payment has gone through, your booking will be added to your account.</p>
<div class="container">
<div class="d-flex justify-content-center">

<!--This form will perform the actions from paymentDetails.inc.php file -->
<form action="bookings/paymentDetails.inc.php" method="post">
 <div class="col-11">
       <label for="CardName" class="form-label"><b><u>Name on the card:</u></b></label>
       <br>
      <input type="text" id="CardName" name="CardName" required>
     </div>
  <div class="col-11">
     <label for="CardNum" class="form-label"><b><u>Card Number</u></b></label>
     <br>
    <input type="number" id="CardNum" name="CardNum" required>
      </div>
     <div class="col-11">
            <label for="Expiration" class="form-label"><b><u>Expiration Date</u></b></label><br>
           <input type="month" id="Expiration" name="Expiration" required>
            </div>
            <div class="col-11">
                <!--When testing i changed the name of this form field as CVV2 to Securitycodeas it looked better on the database table-->
                <label for="SecurityCode" class="form-label"><b><u>CVV2 number</u></b></label><br>
                <input type="number" id="SecurityCode" name="SecurityCode" required>
            </div>
            <div class="col-12">
                <label for="confirmation">By ticking this box you are agreeing that all the details are correct</label>
                <input type="radio" id="confirmation" name="confirmation" value="My details are correct" required>
            </div>
           <div class="col-11">
            <button type="submit" class="btn btn-primary">Purchase tickets!</button>
            </div>
        </form>
    </div>
</div>
 
<br><br>

    <!---If the user isn't signed in then show them this-->
    <?php } else{
        ?>
     <!---The user will see this alert if they aren't logged in-->
     <div class="alert alert-danger" role="alert">
     Please login to be able to purchase our services: <a href="login.php" class="alert-link">Login</a>.
    </div>
     <!--Background image-->
     <div class="ticket_page">
    </div>
  <?php  }

    ?>

</body>
</html>