<?php

declare(strict_types=1);

//Validates if the user has filled in all fields
function is_input_empty(string $username, string $pwd, string $email){
    //If the username, password or email empty 
    if(empty($username) || empty($pwd) || empty($email)){
        //then return true
        return true;
    }
    //If the form has been filled then return false
    else{
        return false;
    }
}

//Checks to make sure tat the email is valid with @ symbol
function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

//Checks the database to see if the user name has been registered already
function is_username_taken(object $pdo, string $username){
    if(get_username($pdo, $username)){
        return true;
    }
    else{
        return false;
    }
}

//Checks the database to see if the email has already been registered. 
function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }
}

//If everything is okay then it will create_user when the function is called. 
function create_user(object $pdo, string $pwd, string $username, string $email){
    set_user($pdo, $pwd, $username, $email);
}