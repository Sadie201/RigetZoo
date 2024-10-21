<?php
//This will stop the session and remove all data within the session
session_start();
session_unset();
session_destroy();

//Send the user back to the homepage
header("Location: ../index.php");
die();