<?php

require_once './dbConfig.php';

if(session_id() == '') {
    session_start();
}

console_log($_SESSION['userid']);

$sql="UPDATE users SET active_status = 0 WHERE userID=?";

$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['userid']);
$stmt->execute();

session_unset();
session_destroy();


?>
