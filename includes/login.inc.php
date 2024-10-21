<?php

//This if statement checks to see if someone has made a request from the appropriate form, in this file it is for the login form.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //These variables store what the user has written in the login HTML form. The strings in square brackets must match the name attribute from the HTML form.
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    try {
        
        //The require_once means that to perform the functionality of the rest of the page it must have these files.
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //This variable stores an empty array.
        $errors = [];

        //These if statements check what the user has typed in and depending on what they have typed will determine which if statement is triggered.
        if(is_input_empty($username, $pwd)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        //This variable stores information from the model, the get user function is an SQL query to check if what the user has typed in matches the database.
        $result = get_user($pdo, $username);

        //These if statements will check what the user has typed in for the username and if it doesn't match the database then it will output this message
        if(is_username_wrong($result)){
            $errors['login_incorrect'] = "Incorrect login info.";
        }
        //This if statement checks if the username is in the database but the password is wrong
        if(!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd'])){
            $errors['login_incorrect'] = "Incorrect login info.";
        }

        require_once 'config_session.inc.php';

        //This if statement checks to see if any of the error messages above have been triggered.
        if($errors){
            //Creates a Session variable called "errors_login", depending on the error from the above if statements will determine what message is ouputted. This links to the login_view file.
            $_SESSION["errors_login"] = $errors;

            header("Location: ../login.php");
            die();
        }

        //This links to the config_session.inc file to create unique IDs for each person logging in.
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result['id'];
        session_id($sessionId);
        
        //Creates a session called 'user_id' that can then be used to determine if the user is logged in or not.
        $_SESSION['user_id'] = $result['id'];
        
        //Creates a session that stores the username from the database.
        $_SESSION['user_username'] = htmlspecialchars($result['username']);

        $_SESSION['last_regeneration'] = time();

        //The header function will send the user to the activities page with a login=success in the URL. This can be used to output a message in the login_view
        header("Location: ../account.php?login=success");
        
        //Makes pdo (connection to database) and stmt variables empty, for security purposes
        $pdo = null;
        $stmt = null;

        die();

        //If the connection to the database doesn't work then catch the error here and output the appropriate message.
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    
}
//If someone tries to access this page without clicking the submit button from the HTML form, send them back to the index page.
else {
    header("Location: ../login.php");
    die();
}