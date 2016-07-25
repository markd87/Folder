<?php

session_start();

error_reporting(E_ALL); ini_set('display_errors', 1); 

$mysqli = new mysqli("localhost", "user", "password", "database");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

?>