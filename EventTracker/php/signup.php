<?php

require_once '../php/dbConfig.php';

$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$affiliation = $_POST['affiliation'];
$pw = $_POST['pw'];
$pw_verify = $_POST['pw-verify'];

$_SESSION['loggedin'] = 0;

//validate not already in users table
$email_exists_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
$exists_count = mysqli_num_rows($email_exists_query);

//PHP validation
//Verify form values are not empty
if(!empty($email) && !empty($pw)){
    
    //Store the data in db, if all the preg_match condition met
    if($exists_count <= 0) {

        if ($pw_verify == $pw) {
            
            $sql = "INSERT INTO users (fname, lname, phone, email, pw, is_admin, affiliation) VALUES ('$fn','$ln','$phone','$email','$pw', 0, '$affiliation')";

            $result=$conn->query($sql);
            

            if ($result) {
                $query = "SELECT userID FROM users WHERE email = '$email'";

                $res=$conn->query($query);                    

                $userid = $res->fetch_object();
                
                
                console_log($userid);
                
                $_SESSION['userid'] = $userid;
                $_SESSION['loggedin'] = 1;
                $_SESSION['email'] = $email;
                $_SESSION['fname'] = $fn;
                $_SESSION['lname'] = $ln;
                $_SESSION['role'] = 0;

                if ($_SESSION['role'] == 0) {
                    header("Location: /EventTracker/pages/main.html");
                } else if ($_SESSION['role'] == 1) {
                    header("Location: /EventTracker/pages/admin.html");
                }

            } else {
                header("Location: /EventTracker/pages/signup.html");
            }

        } else {
            echo '<script type="text/javascript>
            $("#error-msg").innerHTML = "Passwords do not match.";
            $("#error-msg").display("block");
            </script>'; 
        }
    } else {
        echo '<script type="text/JavaScript">
        $("#error-msg").innerHTML = "Account already exists";
        $("#error-msg").display("block");
        </script>';
    }
} else {
    echo '<script type="text/JavaScript">
    alert("fields cannot be empty!"
    window.location.href="/EventTracker/pages/signup.html";
    </script>';

}

?>







