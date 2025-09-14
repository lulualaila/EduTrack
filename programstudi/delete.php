<?php
include '../db.php';
$kode = $_GET['kode'];
$conn->query("DELETE FROM programStudi WHERE kodeProdi=$kode");
header("Location: index.php");
?>
