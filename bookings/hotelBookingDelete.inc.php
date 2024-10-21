<?php
//If the user submits the form then do the below: 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Storing individual booking from the search/search all pages
    $HotelId = $_POST['HotelId'];

    try {
        require_once '../includes/dbh.inc.php';
        //Deletes the hotel booking based on the user ID and the Hotel ID from the form. 
        $query = "DELETE FROM hotelbooking WHERE id = :HotelId;";
        //Prepares the database
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":HotelId", $HotelId);
        $stmt->execute();
        $pdo = null;
        $stmt = null;

        //Takes the user back to the account page with a successful message
        header("Location: ../account.php?Hotelbooking=delete");
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