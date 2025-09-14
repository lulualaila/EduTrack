<?php
include '../db.php';
if($_POST){
  $kode = $_POST['kodeProdi'];
  $nama = $_POST['namaProdi'];
  $fak = $_POST['Fakultas'];
  $sql = "INSERT INTO programStudi VALUES($kode,'$nama','$fak')";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Program Studi</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Tambah Program Studi</h2>
  <div class="container">
    <form method="POST">
      Kode Prodi: <input type="number" name="kodeProdi" required><br><br>
      Nama Prodi: <input type="text" name="namaProdi" required><br><br>
      Fakultas: <input type="text" name="Fakultas" required><br><br>
      <button type="submit" class="button">Simpan</button>
      <a href="index.php" class="button">Batal</a>
    </form>
  </div>
</body>
</html>
