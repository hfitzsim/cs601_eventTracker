<?php 

require_once './dbConfig.php';

if ($_SESSION['loggedin'] === FALSE) {
    header("Location: /EventTracker/pages/login.html");
    echo 'You must log in first';
    exit();
}

$eimg = $_POST['eventimage'];
$etitle = $_POST['eventname'];
$edesc = $_POST['eventdesc'];
$elocation = $_POST ['eventlocation'];
$estart = date('Y-m-d H:i:s', strtotime($_POST['eventdate'].' '.$_POST['eventstart']));
$eend = date('Y-m-d H:i:s', strtotime($_POST['eventdate'].' '.$_POST['eventend']));
$eventpw = $_POST['eventpw'];
$owner = $_POST['firstname'].' '.$_POST['lastname'];
$eemail = $_POST['email'];
$ephone = $_POST['phone'];

$sql = "INSERT INTO events (image, title, description, location, dt_start, dt_end, event_pw, owner, email, phone)
    VALUES ('$eimg','$etitle','$edesc','$elocation','$estart','$eend','$eventpw','$owner', '$eemail', '$ephone')";


if ($conn->query($sql) === TRUE) {
    header("Location: /EventTracker/pages/all-events.html");
   }   
   else { 
       echo "Error: ".$sql."<br>".$conn->error;
    }

$conn->close(); 
?>