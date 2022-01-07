<?php

require_once './dbConfig.php';

$myArray = array();

$sql = "SELECT * FROM users WHERE userID=?";

$stmt=$conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['userid']);
$stmt->execute();
$result=$stmt->get_result();

if ($result) {
    $tempArray = array();
    while ($row = $result->fetch_object()) {
        $tempArray = $row;
        array_push($myArray, $tempArray);
    } 
}

header('Content-type: application/json'); 
echo json_encode($myArray);

?>