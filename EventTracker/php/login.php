<?php

//connect to the database termProject
require_once './dbConfig.php';

//get the user input
$email_entered = $_POST['email'];
$pw_entered = $_POST['pw'];


//query if email exists in db
$sql = "SELECT * FROM users WHERE email =?";

//to use PHP variables in mysqli you must you prepared statements!!
$stmt=$conn->prepare($sql);
$stmt->bind_param("s", $email_entered);
$stmt->execute();
$result = $stmt->get_result();

$count = mysqli_num_rows($result);

//error handling
if(!$result){
    die("Error: ".mysqli_error($conn));
}

if(!empty($email_entered) && !empty($pw_entered)) {
    
    //check if email exists
    if($count <= 0) {
        echo '<script type="text/JavaScript"> 
        alert("Account does not exist");
        window.location.href="/EventTracker/pages/signup.html";
        </script>';

    } else {

        //fetch the user data and store in php session
        while($row = mysqli_fetch_array($result)) {

            //get the user attributes to assign to session variable below
            $id         = $row['userID'];
            $fname      = $row['fname'];
            $lname      = $row['lname'];
            $email      = $row['email'];
            $password   = $row['pw'];
            $role       = $row['is_admin'];
        }   $affiliation= $row['affiliation'];

        
        if($_SESSION['loggedin'] != 1) {

            //check email and password match the info entered 
            if($email_entered === $email && $pw_entered === $password) {
                
                //assign the session variables
                $_SESSION['userid'] = $id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                $_SESSION['loggedin'] = 1;

              
                if ($_SESSION['role'] === 0) {
                    header("Location: /EventTracker/pages/main.html");
                } else if ($_SESSION['role'] === 1) {
                    header("Location: /EventTracker/pages/admin.html");
                }

            } else {
                echo '<script type="text/JavaScript"> 
                $("#error-msg").innerHTML = "Email or password incorrect.";
                $("#error-msg").display("block");
                </script>';
            }
        } else {
            if ($_SESSION['role'] === 0) {
                header("Location: /EventTracker/pages/main.html");
            } else if ($_SESSION['role'] === 1) {
                header("Location: /EventTracker/pages/admin.html");
            }
        }
    }
}


?>