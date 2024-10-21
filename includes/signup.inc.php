<?php
//If registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Gets the users inputs from the form
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    
    try {
        //Connect to the database
        require_once 'dbh.inc.php';
        //Model contains SQL langauges meaning that the information can be inputted to the database
        require_once 'signup_model.inc.php';
        //Validates users inputs from the form
        require_once 'signup_contr.inc.php';

        //ERROR Handlers
        $errors = [];
        //These variables are from the signup_inputs and will output the appropriate response to the user
        if(is_input_empty($username, $pwd, $email)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";
        }
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken!";
        }
        if(is_email_registered($pdo, $email)){
            $errors["email_used"] = "Email already registered";
        }

        //Handles session
        require_once 'config_session.inc.php';
    
        if($errors){
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;
            //Send the user back to the register form with the errors above outputted
            header("Location: ../register.php");
            die();
        }
        //Else create the user
        create_user($pdo, $pwd, $username, $email);
        //Send the user to the login page with a signup success message
        header("Location: ../login.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

        

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}