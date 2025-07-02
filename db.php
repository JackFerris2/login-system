<?php
$host = "sql104.infinityfree.com";
$user = "if0_39379236";
$pass = "Wb7oXn7tHh";
$dbname = "if0_39379236_login_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
