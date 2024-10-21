<?php


//The index file is the homepage of the website that only has a login form and signup form.

//The require files are needed for separate reasons 

//config_session has all functionality to do with sessions and allows username to be stored across multiple pages and remain logged in.
require_once 'includes/config_session.inc.php';

//Signup_view stores functions that contain information that is outputted to the user based on how they have signed up to the website.
require_once 'includes/signup_view.inc.php';

//Login view stores functions that contain information that is outputted to the user based on how they have logged in to the website.
require_once 'includes/login_view.inc.php';

require_once 'bookings/booking_view.inc.php';

require_once 'header.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>

<!--This function will output a 'login successful' message to the user-->
 <?php check_login_errors();
   //This function outputs that their details has been updated successfully
   userInfo_updated_successful();
   //Function outputs that their ticket has been bought successfully
   ticket_logged_successfully();
   //Function outputs that their room has been reserved successfully
   room_booking_successful();
    ?>




            <h1><u>Account</u></h1>
            <p>Welcome <? output_username();?> to your accounts page! This page will allow you to modify your bookings, cancel bookings and view your bookings in one place!</p>
            
                    <h1>View your Ticket bookings</h1>
                    <form action="searchAll.php" method="post">
                    <button class="btn btn-primary">Tickets bookings!</button>
                    </form>
                    <!--This function will output that their booking has been deleted successful-->
                    <?php  booking_deleted_successfully();            
                    ?>

                    <h1>View your Hotel bookings</h1>
                    <form action="searchHotel.php" method="post">
                    <button class="btn btn-primary">Hotel bookings!</button>
                    </form>
                    <!---This function will output that their booking has been deleted succesfully-->
                    <?php hotel_deleted_successful();?>
    
                <h1>View a Hotel room booking based on the room name</h1>
                <form action="search.php" method="post">
                    <select name="roomSearch">
                        <option value="Family room">Family room</option>
                        <option value="Luxury room">Luxury room</option>
                        <option value="Jungle room">Jungle Room</option>
                    </select>
                    <br><br>
                    <button class="btn btn-primary">Find room booking!</button>
                    </form>
                    <div class="container">

                    <h1><u>Update your account details</u></h1>
                    <form action="bookings/userupdate.inc.php" method="post">
                     <label for="password" class="form-label"><u>New password</u></label>
                    <input type="password" class="form-control" name="pwd">
                     <label for="email" class="form-label"><u>New email address</u></label>
                    <input type="email" name="email" class="form-control" placeholder="email@aol.com">
                     <br>
                    <button class="btn btn-info">Update your account!</button>
                    </div>
                    </form>
                    <br>

    

        

</body>
</html>