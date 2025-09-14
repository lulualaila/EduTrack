<?php
$host = "localhost";   // nanti bisa diganti IP laptop lain
$user = "root";
$pass = "";
$db   = "kampus_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
