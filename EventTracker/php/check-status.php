<?php

session_start();

if (isset($_SESSION['loggedin'])) {
    echo('true');
} else {
    echo('false');
}

?>