<?php
$host = "192.168.1.16";   
$user = "webuser";        
$pass = "password123";    
$db   = "mahasiswa";      

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
