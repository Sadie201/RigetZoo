<?php

///The config session allows session variables to be used.
require_once '../includes/config_session.inc.php';

// Check if the form has been submitted through post method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data from POST request
    $CardName = $_POST['CardName'];
    $CardNum = $_POST['CardNum'];
    $Expiration = date('Y-m-d', strtotime($_POST['Expiration']));
    $SecurityCode = $_POST['SecurityCode'];
    //This variable stores the information from the user_id session (this is information about who is logged in)
    $userId = $_SESSION['user_id'];

    try {
        // Include the database connection file
        require_once '../includes/dbh.inc.php';
        
        //SQL query that inserts the payment details into the database
        $query = "INSERT INTO paymentdetails (CardName, CardNum, Expiration, SecurityCode, user_id) VALUES (:CardName, :CardNum, :Expiration, :SecurityCode, :user_id);";
        
        // Prepare the data to be inserted into the database table
        $stmt = $pdo->prepare($query);
        // Bind the users input to the database table
        $stmt->bindParam(":CardName", $CardName);
        $stmt->bindParam(":CardNum", $CardNum);
        $stmt->bindParam(":Expiration", $Expiration);
        $stmt->bindParam(":SecurityCode", $SecurityCode);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();

        $pdo = null;
        $stmt = null;
        
        //takes users back to the accounts page with a success message 
        header("Location: ../account.php?booking=success");
        exit();

    } catch (PDOException $e) {
        // If there's an error with the database query, display an error message
        die("Query failed: " . $e->getMessage());
    }
} else {
    // If the form hasn't been submitted, redirect back to the payment page
    header("Location: ../payment.php");
    die();
}
?>

