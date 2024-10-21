<?php

function ticket_logged_successfully(){
   if (isset($_GET['booking']) && $_GET['booking'] === 'success'){
    echo '<div class="alert alert-success" role="alert">
   Your ticket has been booked successfully. Thank you and we look forward to seeing you soon!
    </div>';
    } 
}

function booking_deleted_successfully(){
    if (isset($_GET['booking']) && $_GET['booking'] === 'delete'){
        echo '<div class="alert alert-success" role="alert">
        Your ticket have been cancelled successfully! 
    </div>';
    }
}

function room_booking_successful() {
    if (isset($_GET['room']) && $_GET['room'] === 'success') {
        echo '<div class="alert alert-success" role="alert">
            Your hotel room has been booked successfully. Thank you, and we look forward to seeing you soon!
        </div>';
    }
}

function hotel_deleted_successful(){
    if (isset($_GET['Hotelbooking']) && $_GET['Hotelbooking'] === 'delete') {
        echo '<div class="alert alert-success" role="alert">
            Your hotel room has been deleted successfully!
        </div>';
    }
}

function ticket_updated_successful(){
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo '<div class="alert alert-success" role="alert">
            Your ticket booking has been updated successfully!
        </div>';
    }
}
function hotel_updated_successful(){
    if (isset($_GET['update']) && $_GET['update'] === 'success') {
        echo '<div class="alert alert-success" role="alert">
            Your hotel booking has been updated successfully!
        </div>';
    }
}

function userInfo_updated_successful(){
    if (isset($_GET['userUpdate']) && $_GET['userUpdate'] === 'success') {
        echo '<div class="alert alert-success" role="alert">
            Your password and email has been updated successfully!
        </div>';
    }
}

function contactform_added_successful(){
    if (isset($_GET['Enquiry']) && $_GET['Enquiry'] === 'success') {
        echo '<div class="alert alert-success" role="alert">
            Your enquiry was sent successfully! We will email you as soon as we can to answer your questions. 
        </div>';
    }
}