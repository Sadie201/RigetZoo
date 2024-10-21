<?php

//The config session allows session variables to be used. If this isnt included then the ticket being booked would get add to everyones table. 
require_once '../includes/config_session.inc.php';
//If the user submits the form on the tickets page
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Creating variables which will store the users response from the ticket booking form. 
    $dates = $_POST['dates'];
    $tTime = $_POST['tTime'];
    $Duration = $_POST['Duration'];
    $amount = $_POST['amount'];


    //This variable stores the information from the user_id session (this is the information about who is logged in.)
    $userId = $_SESSION['user_id'];

    try {
        //This allows this file to be connected to the database
        require_once '../includes/dbh.inc.php';

        //Allows this file to utilise the validation function
        require_once 'booking_contr.inc.php';

        //Stores an empty array called errors
        $errors = [];

        //if statement to check that the user has typed in data in the time and amount in the field box. This function is stored in booking_control. 
        if(is_input_empty($dates, $tTime)){
            $errors['empty_input'] = "Fill in all fields.";
        }

        //if there are errors, create a session called errors_booking
        if($errors){
            $_SESSION['errors_booking'] = $errors;
            //Takes the user to the ticket page and displays the errors so they can fix it
            header("Location: ../ticket.php");
            die();
        }
        
        //Creates an SQL that adds the information from the user to the tickets table in the database
        $query = "INSERT INTO tickets (dates, tTime, Duration, amount, user_id) VALUES (:dates, :tTime, :Duration, :amount, :aUser_id);";
        
        //Prepares the data ready to be inserted into the database
        $stmt = $pdo->prepare($query);
        //Binds the users inputs to the database table 
        $stmt->bindParam(":dates", $dates);
        $stmt->bindParam(":tTime", $tTime);
        $stmt->bindParam(":Duration", $Duration);
        $stmt->bindParam(":amount", $amount);
        $stmt->bindParam(":aUser_id", $userId);
        $stmt->execute();
        
        $pdo = null;
        $stmt = null;

        //Send users to the payment page
        header("Location: ../payment.php");
        die();

        //If there is a problem with connecting to database it will echo the error.
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
//If someone tries to access this page without clicking book tickets button then keep them on the ticket page
else{
    header("Location: ../tickets.php");
}