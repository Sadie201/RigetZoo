<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){

    $query = "SELECT username FROM users WHERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;

}

function get_email(object $pdo, string $email){
    
    $query = "SELECT username FROM users WHERE email = :email;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;

}

function set_user(object $pdo, string $pwd, string $username, string $email){
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)";

    $stmt = $pdo->prepare($query);
    //Hashes password starts
    $options = [
        'cost' => 12
    ];
    //Password hashed 
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT, $options);
    
    //Binds the user inputs and the database together
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pwd', $hashedpwd);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}
