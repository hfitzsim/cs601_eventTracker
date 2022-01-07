<?php
require_once './dbConfig.php';

$current_pw         = $_POST['current-pw'];
$new_pw             = $_POST['new-pw'];
$verify_new_pw      = $_POST['verify-new-pw'];


$query = "SELECT * FROM users WHERE userID=?;";

$stmt=$conn->prepare($query);
$stmt->bind_param('i', $_SESSION['userid']);
$stmt->execute();
$result = $stmt->get_result();

//error handling
if(!$result){
    die("Error: ".mysqli_error($conn));
} 
else {

    while($row = mysqli_fetch_array($result)) {
        $old_pw   = $row['pw'];
    } 
    console_log($old_pw);
    console_log($current_pw);
    console_log($new_pw);
    console_log($verify_new_pw);
    
    if ($old_pw === $current_pw && $new_pw === $verify_new_pw) {
        $sql = "UPDATE termProject.users SET pw=? WHERE userID=?;";
    
        $stmt2=$conn->prepare($sql);
        $stmt2->bind_param('si', $new_pw, $_SESSION['userid']);
        $stmt2->execute();

        echo '<script type="text/javascript">
        alert("You have successfully updated your password.");
        window.location.href="/EventTracker/pages/account.html";
        </script>';
    }
    else {
        echo '<script type="text/javascript">
    alert("New passwords must match!");
    // window.location.href="/EventTracker/pages/account.html";
    </script>';
    }
}
?>