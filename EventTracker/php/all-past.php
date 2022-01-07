<?php

require_once './dbConfig.php';

$myArray = array();

$sql = "SELECT * FROM events WHERE dt_start < CURDATE() ORDER BY dt_start asc;";

if ($result=$conn->query($sql)) {
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