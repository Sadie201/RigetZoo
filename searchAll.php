<?php

//Include the header file in the search page, this contains the navbar, logout button and username etc.
require_once 'header.php';

//If someone clicks the search button then run the code underneath
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Create a variable that stores the user ID to then allow the program to show data for a specific user.
    $userId = $_SESSION['user_id'];
 

    try {
        require_once 'includes/dbh.inc.php';

        //SQL query to search for all tickets, specifically return data for one user
        $query = "SELECT * FROM tickets WHERE user_id = :aUser_Id;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":aUser_Id", $userId);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    //Catch errors and outputs it to the user
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("Location: ../account.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>All Tickets booked</title>
</head>
<body>

    
    <h1><u>Ticket Bookings!</u></h1>

    <hr>

    <?php

    if(empty($results)){
        echo 'You have not booked a visit to our zoo!';
    }
    else{
        foreach ($results as $row){
            //Print information for each column in the database, looping through each row of data.
            //The string in the square brackets must match the column name in the database.
            echo "<b>Booking Date:</b> " . htmlspecialchars($row['dates']);
            echo '<br>';
            echo "<b>Booking Time:</b> " . htmlspecialchars($row['tTime']);
            echo '<br>';
            echo "<b>Quantity:</b> " . htmlspecialchars($row['amount']);
            echo '<br>';
            echo "<b>Duration:</b> " . htmlspecialchars($row['Duration']);
            echo '<br>';
            echo "<b>Date purchased:</b> " . htmlspecialchars($row['created_at']);
            echo '<br>';
            //Delete form 
            echo'<form action="bookings/bookingDelete.inc.php" method="post">
            <input type="hidden" name="booking_id" value="'.$row['id'].'">
            <button type="submit" class="btn btn-danger">Delete booking</button>
            </form>';
            echo '<hr>';
        }
    }
    ?>

</body>
</html>