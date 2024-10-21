<?php





//config_session has all functionality to do with sessions and allows username to be stored across multiple pages and remain logged in.
require_once 'includes/config_session.inc.php';

//Login view stores functions that contain information that is outputted to the user based on how they have logged in to the website.
require_once 'includes/login_view.inc.php';
//Contains navbar and footer
require_once 'header.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

     
            <div class="login_page">
            <!--This function will let users know that their account has been registered successfully-->
            <?php check_signup_errors();?>
            <h1><u>Login</u></h1>
            <p>Welcome back!</p>
            <div class="container">
            <div class="d-flex justify-content-center">
            <form action="includes/login.inc.php" method="post">
            <div class="col-12">
             <label for="username" class="form-label"><u>First and last name</u></label>
             <input type="text" class="form-control" name="username" placeholder="Jane Doe">
             </div>
                <br>
             <div class="col-12">
             <label for="password" class="form-label"><u>Password</u></label>
             <input type="password" name="pwd" class="form-control" placeholder="Password">
             <br>
             </div>
                <button type="submit" class="btn btn-info">Login</button>
                <p>Don't have an account? <a href="register.php">Register</a></p>
                
            <?php
            //Call the check_login_errors function from login_view
                check_login_errors();
            ?>
            </form>

            </div>
            </div>
</div>


        
            

           


</body>
</html>
