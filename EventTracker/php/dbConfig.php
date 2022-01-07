<?php

ob_start();

if(!isset($_SESSION)) {
    session_start();
}

$server = "localhost";
$user = "user1";
$pw = "passcode1";
$db = "termProject";

$conn = new mysqli($server, $user, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

//for printing to the browser console--source: stackoverflow
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

?>