<?php
include '../db.php';
$nim = $_GET['nim'];
$conn->query("DELETE FROM dataMhs WHERE NIM='$nim'");
header("Location: index.php");
?>
