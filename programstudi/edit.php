<?php
include '../db.php';
$kode = $_GET['kode'];
$result = $conn->query("SELECT * FROM programStudi WHERE kodeProdi=$kode");
$row = $result->fetch_assoc();
if($_POST){
  $nama = $_POST['namaProdi'];
  $fak = $_POST['Fakultas'];
  $sql = "UPDATE programStudi SET namaProdi='$nama', Fakultas='$fak' WHERE kodeProdi=$kode";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Program Studi</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Edit Program Studi</h2>
  <div class="container">
    <form method="POST">
      Nama Prodi: <input type="text" name="namaProdi" value="<?= $row['namaProdi'] ?>"><br><br>
      Fakultas: <input type="text" name="Fakultas" value="<?= $row['Fakultas'] ?>"><br><br>
      <button type="submit" class="button">Update</button>
      <a href="index.php" class="button">Batal</a>
    </form>
  </div>
</body>
</html>
