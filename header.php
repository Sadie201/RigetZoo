<?php

//The header file is a file that is used on every page when information needs to be replicated across multiple pages e.g., the navbar.

//The require files are needed for separate reasons 

//config_session has all functionality to do with sessions and allows username to be stored across multiple pages and remain logged in.
require_once 'includes/config_session.inc.php';

//Signup_view stores functions that contain information that is outputted to the user based on how they have signed up to the website.
require_once 'includes/signup_view.inc.php';

//Login view stores functions that contain information that is outputted to the user based on how they have logged in to the website.
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--CSS link-->
    <link rel="stylesheet" href="lightmode.css" id="theme">
    <!--Javascript link-->
    <script src="main.js"></script>
    <link rel="icon" href="images/elephant.png">


</head>
<body>
    







<!--Navbar starts-->
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="30%"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <!--These links will show even if the user hasn't signed in-->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Homepage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="information.php">Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="learning.php">Learning and Educational visits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tickets.php">Book Tickets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hotel_room.php">Book Hotel Room</a>
        </li>
        <?php
        //If the user_id session is active (the user is logged in) then output the logout button
        if(isset($_SESSION['user_id'])) {?>
        <!--If user is signed in then show account on the nav-link instead of login/register-->
         <li class="nav-item">
          <a class="nav-link" href="account.php">Account</a>
        </li>
        <li class="logged_out"> 
        <!--This form will perform all functions from logout.inc-->
        <form action="includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
       
         <!--This will output the users username-->
          <?php output_username();
         ?>
            </li>
        <?php }
          
        //If the user isnt signed in then this will appear-->
        else{ ?>
             <li class="nav-item">
             <a class="nav-link" href="login.php">Create account/login</a>
         </li>
      <?php  } 
      
        ?>
      </ul>
    </div>
  </div>
</nav>


<footer>
    <a href="accessibility.php">acccessibility</a>
     <a href = "contact.php">Contact</a>
  </footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>