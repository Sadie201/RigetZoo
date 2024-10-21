<?php

declare(strict_types=1);

function output_username(){

    //If the session 'user_id' exists from the login.inc page then print to the page the username using the session 'user_username' that is created in login.inc
    if (isset($_SESSION['user_id'])) {
        echo 'You are logged in as ' . $_SESSION['user_username'];
    } else {
        echo 'You are not logged in';
    }

}

function check_login_errors(){
    //If the Session errors_login exists from the login.inc file.
    if (isset($_SESSION['errors_login'])){
        //This variable stores the session name from the matching if statement from the login.inc
        $errors = $_SESSION['errors_login'];

        echo'<br>';


        foreach($errors as $error){
            //This will output the appropriate error message depending on what the user has done e.g., left all boxes empty, wrong password etc.
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }

        unset($_SESSION['errors_login']);
    }

    //If in the URL it says login=success then output message saying 'Login Success!'
    else if (isset($_GET['login']) && $_GET['login'] === 'success'){
        echo '<br>';
        echo '<div class="alert alert-success" role="alert">
        Login successfully!
      </div>';
    }
}