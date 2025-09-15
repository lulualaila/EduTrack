<?php
include '../db.php';
if(isset($_GET['kode'])){
    $kode = $conn->real_escape_string($_GET['kode']);
    $conn->query("DELETE FROM programStudi WHERE kodeProdi='$kode'");
}
header("Location: index.php");
exit;
?>
