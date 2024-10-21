<?php
//config_session has all functionality to do with sessions
require_once 'includes/config_session.inc.php';

//This file contains functions which is outputted to the user based on how they have signed up. 
require_once 'includes/signup_view.inc.php';

//Contains the navbar so that users can go to another page
require_once 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<div class="register_page">
<h1><u>Register your account!</u></h1>
<div class="container">
<div class="d-flex justify-content-center">
<div class="column">
<form action="includes/signup.inc.php" method="post">
<?php
//This calls the signup_inputs function from signup_view page. This function stores the inputs for the form.
    signup_inputs();
?>
<button type="submit" class="btn btn-info">Signup</button>
<p>Already have a account? <a href="login.php">Login</a></p>
</div>
</div>
</div>
<?php
//This calls the check_signup_errors function from signup_view page which will ensure the user has filled the form properly
    check_signup_errors();
?>

</div>
</form>
</body>
</html>
