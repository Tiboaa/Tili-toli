<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "usersdb";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>