<?php

require_once './dbConfig.php';

$selectedEvent = $_POST['selectedEvent'];
console_log($selectedEvent);

$sql = "INSERT INTO userEvent (userID, eventID) Values (?, ?)";

//create prepared statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $_SESSION['userid'], $selectedEvent);
$stmt->execute();
$result=$stmt->get_result();

header("Location: /EventTracker/pages/users-events.html");

$conn->close();

?>