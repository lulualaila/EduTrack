<?php
include '../db.php';
if(isset($_GET['nim'])){
    $nim = $conn->real_escape_string($_GET['nim']);
    $conn->query("DELETE FROM dataMhs WHERE NIM='$nim'");
}
header("Location: index.php");
exit;
?>
