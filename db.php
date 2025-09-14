<?php
$host = "192.168.0.117";   // IP laptop A
$user = "webuser";         // user baru
$pass = "password123";     // password sesuai yang dibuat
$db   = "mahasiswa";       // database

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
