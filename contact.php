<?php
//Holds the navigation and footer information
require_once 'header.php';

//Allows an success message for the contact form
require_once 'bookings/booking_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>

<?php
//Outputs a success message when users submits the contact form 
contactform_added_successful()
?>

<h1><u>Contact us</u></h1>
<p>If you need information about booking for an educational visit or if you have some questions then this page will help you!</p>
<!--Opening times-->
<h3><u>Our opening Times</u></h3>
<div class="d-flex justify-content-center">
<ul>
    <li>Monday: 8:30 - 17:00</li>
    <li>Tuesday: 8:30 - 17:00</li>
    <li>Wednesday: 8:30 - 17:00</li>
    <li>Thursday: 8:30 - 17:00</li>
    <li>Friday: 9:00 - 17:00</li>
    <li>Saturday: 9:00 - 16:00</li>
</ul>
</div>
<!--Opening times ends-->


<!--Contact form-->
<h3><u>Contact Form</u></h3>
 <div class="container">
 <div class="d-flex justify-content-center">
 <form action="bookings/contact.inc.php" method="post">
 <div class="col-12">
    <label for="username" class="form-label"><u>First name</u></label>
    <input type="text" class="form-control" name="username" placeholder="Jane" required>
</div>
    <div class="col-12">
    <label for="email" class="form-label"><u>Email address</u></label>
    <input type="text" class="form-control" name="email" placeholder="Jane@aol.com" required>
</div>
    <div class="col-12">
    <label for="Enquiry"><u>Enquiry</u></label>
    <textarea class="form-control" placeholder="Enquiry..." name="Enquiry" id="Enquiry" style="height: 100px" required></textarea>
<button type="submit" class="btn btn-info">Send</button>
</div>
<!--Contact form ends-->

<!--Map of location-->
<h3><u>Use the map below to find our location</u></h3>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10091.083465021286!2d-3.0442516128417965!3d50.779821000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486d8788fc978627%3A0x1e51c7db580a1113!2sAxe%20Valley%20Wildlife%20Park!5e0!3m2!1sen!2suk!4v1713793441547!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<br><br>
</body>
</html>