<?php
$menu = "dashboard";
$title = "Dashboard - EduTrack";
ob_start();
?>
<h1>Dashboard</h1>
<p>Selamat datang di <b>EduTrack</b>, mini SIAKAD sederhana.</p>
<?php
$content = ob_get_clean();
include 'layout.php';
?>
