<?php
//If the user submits the form then do the below: 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Storing individual booking from the search/search all pages
    $booking_id = $_POST['booking_id'];

    try {
        require_once '../includes/dbh.inc.php';
        //Deletes the ticket ased on the user ID and the Booking ID from the form. 
        $query = "DELETE FROM tickets WHERE id = :booking_id;";
        //Prepares the database
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":booking_id", $booking_id);
        $stmt->execute();
        $pdo = null;
        $stmt = null;

        //Takes the user back to the account page with a successful message
        header("Location: ../account.php?booking=delete");
        //Kills the connection for security reasons
        die();

        //If there is any errors it will output them to the user
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    //If the user hasn't submitted anything it will take them back to the accounts page. 
    header("Location: ../account.php");
}