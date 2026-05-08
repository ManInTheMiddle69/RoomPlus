<?php
// connect.php - Pure connection only
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'Shop';
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
?>