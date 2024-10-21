<?php

//Include the header file in the search page, this contains the navbar, logout button and username etc.
require_once 'header.php';

//If someone clicks the search button then run the code underneath
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //Create a variable that stores the users room choice
    $roomSearch = $_POST['roomSearch'];

    //Create a variable that stores the user ID to then allow the program to show data for a specific user.
    $userId = $_SESSION['user_id'];
 

    try {
        require_once 'includes/dbh.inc.php';

        //SQL query to search for all the current hotel room booking the user has from the rooom they have selected. 
        $query = "SELECT * FROM hotelbooking WHERE room_id = :roomSearch AND user_id = :aUser_Id;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":roomSearch", $roomSearch);
        $stmt->bindParam(":aUser_Id", $userId);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pdo = null;
        $stmt = null;


        //If there is any errors it will output the message using the catch 
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
//If the user isn't suppose to access this file they will be sent to the accounts page. 
else{
    header("Location: ../account.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Changes the tab name to match the room the user has searched for-->
    <title><?php echo $roomSearch?></title>
</head>
<body>

    <!--Changes heading to match the activity the user has searched for-->
    <h1><?php echo 'Room booking for '. $roomSearch?></h1>

    <hr>

    <?php

    if(empty($results)){
        echo 'There are no ' . $roomSearch . " booked";
    }
    else{
        foreach ($results as $row){
            //Print information for each column in the database, looping through each row of data.
            //The string in the square brackets must match the column name in the database.
            echo "<b>Start date:</b> " . htmlspecialchars($row['Startdate']);
            echo '<br>';
            echo "<b>Time of arrival:</b> " . htmlspecialchars($row['StartTime']);
            echo '<br>';
            echo "<b>Departure date:</b> " . htmlspecialchars($row['Enddate']);
            echo '<br>';
            echo "<b>Departure time:</b> " . htmlspecialchars($row['EndTime']);
            echo '<br>';
            //Delete bookings 
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