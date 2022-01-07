<?php

//connect to db termProject
require_once './dbConfig.php';

//user input
$selectedEvent = $_POST['registeredEvent'];
$eventKey = $_POST['eventKey'];


//validate that the entered event key matches the event pw in the db

//query for the event in the db
$sql="SELECT * FROM events WHERE eventID = ?";

//need prepared statement
$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $selectedEvent);
$stmt->execute();
$result=$stmt->get_result();

//error handling
if(!$result){
    die("Error: ".mysqli_error($conn));
}

//$result is an object we have to extract
while($row = mysqli_fetch_array($result)) {

    $eventTitle     = $row['title'];
    $eventPW     = $row['event_pw'];
}

// if the event key matches the password in the db
if ($eventKey == $eventPW) {

    // increase user progress by 1
    $query="UPDATE UserEvent SET attendedIndicator=1 WHERE eventID=?";

    //prepare statement for execution
    $stmt2=$conn->prepare($query);
    $stmt2->bind_param("i", $selectedEvent);
    $stmt2->execute();

    // redirect the user to their progress page
    echo('<script type="text/javascript"> alert("You have checked-in successfully");
    window.location.href="/EventTracker/pages/progress.html";</script>');

} else {
    // if the event key does not match the password in the db, alert user password is incorrect
    
    
}




?>