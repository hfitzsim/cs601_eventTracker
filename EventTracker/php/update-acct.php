<?php
require_once './dbConfig.php';

$usrimg = $_POST['userimage'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$affiliation = $_POST['affiliation'];

$sql = "UPDATE termProject.users SET photo=?, fname=?, lname=?, affiliation=? WHERE userID=?;";

$stmt=$conn->prepare($sql);
$stmt->bind_param("bsssi", $usrimg, $fname, $lname, $affiliation, $_SESSION['userid']);
$stmt->execute();



?>