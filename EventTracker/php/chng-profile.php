<?php
                                                                                                                 
require_once './dbConfig.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$affiliation = $_POST['affiliation'];

$sql = "INSERT INTO users (fname, lname, username, affiliation)
    VALUES ('$firstname','$lastname','$username','$affiliation')";

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">
    '
    ;
   }   
   else { 
       echo "Error: ".$sql."<br>".$conn->error;
    }

$conn->close();

?>