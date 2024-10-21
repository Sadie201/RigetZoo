<?php

declare(strict_types=1);

function signup_inputs(){

        //if the username that has been typed in doesn't exist and there are no errors then keep the username they have typed in, in the box
        if(isset($_SESSION['signup_data']['username']) && !isset($_SESSION['errors_signup']['username_taken'])){
         echo ' <div class="col-11">
        <label for="username"><u>First and last name</u></label>
        <input type="text" name="username" placeholder="Jane Doe">';
       echo '</div>';
       echo '<br>';
        //Otherwise output a blank input box
        } else{
            echo '<div class="col-11">
            <label for="username"><u>First and last name</u></label>
            <input type="text" name="username" placeholder="Jane Doe">';
            echo '</div>';
            echo '<br>';
        }

        //Outputs a blank password input box
        echo'<div class="col-11">
        <label for="pwd"><u>Password</u></label>
        <br>
        <input type="password"  name="pwd" placeholder="Passsword">';
        echo '</div>';
        echo '<br>';

        //if the email that has been typed in doesn't exist and there are no errors then keep the email they have typed in, in the text box
        if(isset($_SESSION['signup_data']['email']) && !isset($_SESSION['errors_signup']['email_used']) && !isset($_SESSION['errors_signup']['invalid_email'])){
            echo ' <div class="col-11">
            <label for="email"><u>Email Address</u></label>
          <br>
            <input type="text" name="email" placeholder="Email" value="'.$_SESSION['signup_data']['email'].'">';
            echo '</div>';
            echo '<br>';

        //otherwise output an empty input box for email
        } else{
           echo ' <div class="col-11">
            <label for="email"><u>Email Address</u></label>
             <br>
            <input type="text" name="email" placeholder="Email">';
            echo '</div>';
            echo '<br>';
            
            
        }

}

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach($errors as $error){
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }

        unset($_SESSION["errors_signup"]);
    } else if (isset($_GET['signup']) && $_GET['signup'] === 'success'){
        echo '<br>';
        echo '<div class="alert alert-success" role="alert">
        You have registered your account successfully!
      </div>';
    }
}