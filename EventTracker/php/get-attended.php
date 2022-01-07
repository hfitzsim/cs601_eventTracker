<?php

require_once './dbConfig.php';

$sql="SELECT count(*) as attendedCount FROM UserEvent WHERE userID =? AND attendedIndicator = 1;";

$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['userid']);
$stmt->execute();
$result=$stmt->get_result();

$attendedEventCount = $result->fetch_object();
header('Content-type: application/json'); 
echo json_encode($attendedEventCount);

?>