<?php
///The config session allows session variables to be used. If this isnt included then everyones password and email would get changed. 
require_once '../includes/config_session.inc.php';
//Checks whether the form has been submitted as a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $userId = $_SESSION['user_id'];


    //Hashes password starts
    $options = [
        'cost' => 12
    ];
    //Password hashed 
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT, $options);
    

    try {
        //Connects the database to this file
        require_once '../includes/dbh.inc.php';
        //Update user SQL table 
        $query = "UPDATE users SET pwd = :pwd, email = :email WHERE id = :aUser_id;";
        //Bind the variables to the correct database table.
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":pwd", $hashedpwd);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":aUser_id", $userId);

        $stmt->execute();
    
        $pdo = null;
        $stmt = null;

        //Send the user to their account page
        header("Location: ../account.php?userUpdate=success");

        die();
        //Catches any database errors
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
//Send user back to their homepage.
else{
    header("Location: ../index.php");
}