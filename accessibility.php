<?php

require_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessibility</title>
</head>
<body>

<h1><u>Accessibility features!</u></h1>
<p>This page is dedicated to accessibility features</p>

<h3><u>Dark mode</u></h3>
<button class="btn btn-info" onclick= "changeCSS()">Dark mode / light mode</button>

<h3><u>Font size change</u></h3>
<button class="btn btn-info" onclick= "changeFontSize('15px')">Small font size</button>
<button class="btn btn-info" onclick= "changeFontSize('20px')">Medium font size</button>
<button class="btn btn-info" onclick= "changeFontSize('40px')">Large font size</button>


