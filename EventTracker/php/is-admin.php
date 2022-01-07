<?php

session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 1) {
    echo("true");
} else {
    echo("false");
}