<?php

declare(strict_types=1);
//Checks to see if the form is empty or not
function is_input_empty(string $dates, string $tTime){
    //If either of the field is empty
    if(empty($dates) || empty($tTime)){
        return true;
    } else {
        return false;
    }
}



function field_input_empty($Startdate, $StartTime){
    //If either of the field is empty
    if(empty($Startdate) || empty($StartTime)){
        return true;
    } else {
        return false;
    }
}