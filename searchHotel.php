<?php

//Include the header file in the search page, this contains the navbar, logout button and username etc.
require_once 'header.php';

//If someone clicks the search button then run the code underneath
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Create a variable that stores the user ID to then allow the program to show data for a specific user.
    $userId = $_SESSION['user_id'];
 

    try {
        require_once 'includes/dbh.inc.php';

        //SQL query to search for all hotel rooms, specifically return data for one user
        $query = "SELECT * FROM hotelbooking WHERE user_id = :aUser_Id;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":aUser_Id", $userId);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;


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
    
    <title>Hotel rooms booked</title>
</head>
<body>

    
    <h1>Hotel rooms Bookings</h1>

    <hr>

    <?php

    if(empty($results)){
        echo 'You have not booked a Hotel room!';
    }
    else{
        foreach ($results as $row){
            //Print information for each column in the database, looping through each row of data.
            //The string in the square brackets must match the column name in the database.
            echo "<b>Room Name:</b> " . htmlspecialchars($row['room_id']);
            echo '<br>';
            echo "<b>Start date:</b> " . htmlspecialchars($row['Startdate']);
            echo '<br>';
            echo "<b>Time of arrival:</b> " . htmlspecialchars($row['StartTime']);
            echo '<br>';
            echo "<b>Departure date:</b> " . htmlspecialchars($row['Enddate']);
            echo '<br>';
            echo "<b>Departure time:</b> " . htmlspecialchars($row['EndTime']);
            echo '<br>';
            //Delete form 
            echo'<form action="bookings/hotelBookingDelete.inc.php" method="post">
            <input type="hidden" name="HotelId" value="'.$row['id'].'">
            <button type="submit" class="btn btn-danger">Delete booking</button>
            <hr>
            </form>';
        }
    }
    ?>

</body>
</html>