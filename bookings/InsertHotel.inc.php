<?php

//The config session allows session variables to be used. If this isnt included then the ticket being booked would get add to everyones table. 
require_once '../includes/config_session.inc.php';
//If the user submits the form on the tickets page
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Creating variables which will store the users response from the ticket booking form. 
    $Startdate= $_POST['Startdate'];
    $StartTime = $_POST['StartTime']; 
    $Enddate = $_POST['Enddate'];
    $EndTime = $_POST['EndTime'];
    //This variable stores the information from the user_id session (this is the information about who is logged in.)
    $userId = $_SESSION['user_id'];
    //This will save the room name to the database. 
    $room_id = $_POST['room_id'];


    try {
        //This allows this file to be connected to the database
        require_once '../includes/dbh.inc.php';

        //Allows this file to utilise the validation function
        require_once 'booking_contr.inc.php';

        //Stores an empty array called errors
        $errors = [];

        //if statement to check whether the start time/date has been filled properly. 
        if(field_input_empty($Startdate, $StartTime)){
            $errors['empty_input'] = "Fill in all fields.";
        }

        //if there are errors, create a session called errors_booking
        if($errors){
            $_SESSION['errors_booking'] = $errors;
            //Takes the user to the safari room page and displays the errors so they can fix it
            header("Location: ../safari_room.php");
            die();
        }
        
        //Creates an SQL that adds the information from the user to the Hotelbooking table in the database
        $query = "INSERT INTO Hotelbooking (Startdate, StartTime, Enddate, EndTime, user_id, room_id) VALUES (:Startdate, :StartTime, :Enddate, :EndTime, :aUser_id, :room_id);";
        
        //Prepares the data ready to be inserted into the database
        $stmt = $pdo->prepare($query);
        //Binds the users inputs to the database table 
        $stmt->bindParam(":Startdate", $Startdate);
        $stmt->bindParam(":StartTime", $StartTime);
        $stmt->bindParam(":Enddate", $Enddate);
        $stmt->bindParam(":EndTime", $EndTime);
        $stmt->bindParam(":aUser_id", $userId);
        $stmt->bindParam(":room_id", $room_id);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

      
        //Send users to the payment page
        header("Location: ../Hotelpayment.php");
        die();

        //If problem connecting to database, echo message.
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
//If someone tries to access this page without clicking book tickets button then keep them on the ticket page
else{
    header("Location: ../hotel_room.php");
}