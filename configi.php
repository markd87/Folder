<?php

session_start();

error_reporting(E_ALL); ini_set('display_errors', 1); 

$mysqli = new mysqli("localhost", "cl26-markd", "oscar87", "cl26-markd");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

?>