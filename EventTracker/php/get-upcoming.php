<?php

require_once './dbConfig.php';

$myArray = array();

$id = $_SESSION['userid'];

$sql = "SELECT events.* FROM UserEvent JOIN events on UserEvent.eventID = events.eventID
    WHERE userEvent.userID=? AND dt_start > CURDATE() ORDER BY dt_start asc;";

//to use PHP variables in mysqli you must you prepared statements!!
$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['userid']);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {

    $tempArray = array();
    while ($row = $result->fetch_object()) {
        $tempArray = $row;
        array_push($myArray, $tempArray);
    } 
    header('Content-type: application/json'); 
    echo json_encode($myArray);
    $result->close();
}

$conn->close();

?>