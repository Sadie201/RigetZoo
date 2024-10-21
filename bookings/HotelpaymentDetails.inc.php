<?php

///The config session allows session variables to be used.
require_once '../includes/config_session.inc.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data from POST request
    $CardName = $_POST['CardName'];
    $CardNum = $_POST['CardNum'];
    $Expiration = date('Y-m-d', strtotime($_POST['Expiration']));
    $SecurityCode = $_POST['SecurityCode'];
    // Retrieve user ID from session
    $userId = $_SESSION['user_id'];

    try {
        // Include the database connection file
        require_once '../includes/dbh.inc.php';
       
        // Prepare SQL query to insert payment details into the database
        $query = "INSERT INTO paymentdetails (CardName, CardNum, Expiration, SecurityCode, user_id) VALUES (:CardName, :CardNum, :Expiration, :SecurityCode, :user_id);";
        
        // Prepare the query for execution
        $stmt = $pdo->prepare($query);
        // Bind form data to the query parameters
        $stmt->bindParam(":CardName", $CardName);
        $stmt->bindParam(":CardNum", $CardNum);
        $stmt->bindParam(":Expiration", $Expiration);
        $stmt->bindParam(":SecurityCode", $SecurityCode);
        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();
        
        //takes users back to the accounts page with a success message 
        header("Location: ../account.php?room=success");
        exit();

    } catch (PDOException $e) {
        // If there's an error with the database query, display an error message
        die("Query failed: " . $e->getMessage());
    }
} else {
    // If the form hasn't been submitted, redirect back to the payment page
    header("Location: ../Hotelpayment.php");
    die();
}
?>

