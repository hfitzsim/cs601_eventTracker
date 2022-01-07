<?php

require_once './dbConfig.php';

$myArray = array();

$sql = "SELECT * FROM users";

if ($result=$conn->query($sql)) {
    $tempArray = array();
    while ($row = $result->fetch_object()) {
        $tempArray = $row;
        array_push($myArray, $tempArray);
    } echo json_encode($myArray);
}
$result->close();
$conn->close();

?>