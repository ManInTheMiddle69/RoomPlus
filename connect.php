<?php
// db_connect.php - PURE Procedural
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'Shop';


$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8");


$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);



?>