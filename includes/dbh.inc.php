<?php
//The host is localhost. We are using laragon. 
$host = 'localhost';
//This will allow the website to connect to the correct database table. For this website it is rigetzoo. 
$dbname = 'rigetzoo';
$dbusername = 'root';
$dbpassword = '';

try {
    //Connects to all the variables 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //If the database doesn't connect successfully then it will output a message
    die("Connection failed: " . $e->getMessage());
}