<?php
//The config session allows session variables to be used. 
require_once '../includes/config_session.inc.php';
//If the user submits the form on the contact page
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
   //Creating variables which will store the users response from the contact form. 
   $username = $_POST['username'];
   $email = $_POST['email'];
   $Enquiry= $_POST['Enquiry'];

   //This variable stores the information from the user_id session (this is the information about who is logged in.)
   $userId = $_SESSION['user_id'];

   try {
       //This allows this file to be connected to the database
       require_once '../includes/dbh.inc.php';
       
       
       //Creates an SQL that adds the information from the user to the tickets table in the database
       $query = "INSERT INTO contact (username, email,Enquiry, user_id) VALUES (:username, :email, :Enquiry, :aUser_id);";
       
       //Prepares the data ready to be inserted into the database
       $stmt = $pdo->prepare($query);
       //Binds the users inputs to the database table 
       $stmt->bindParam(":username", $username);
       $stmt->bindParam(":email", $email);
       $stmt->bindParam(":Enquiry", $Enquiry);
       $stmt->bindParam(":aUser_id", $userId);
       $stmt->execute();
       $pdo = null;
       $stmt = null;

       //Send users to the payment page
       header("Location: ../contact.php?Enquiry=success");
       die();

       //If there is a problem with connecting to database it will echo the error.
    } catch (PDOException $e) {
       die("Query failed: " . $e->getMessage());
    }
    //If someone tries to access this page without clicking on submit   
} else { 
   header("Location: ../contact.php");
}


