<?php
$host = "localhost";
$user = "root"; // change if you set a different username
$pass = ""; // change if you have a password
$db   = "sashs";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
