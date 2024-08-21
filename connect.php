<?php
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "Christopher2@A";
$DATABASE = "signupforms";

// Create connection using MySQLi
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


