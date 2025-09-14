<?php
include '../db.php';
if($_POST){
  $nim = $_POST['NIM'];
  $nama = $_POST['Nama'];
  $email = $_POST['email'];
  $jurusan = $_POST['jurusan'];
  $status = $_POST['status'];
  $angkatan = $_POST['angkatan'];
  $sql = "INSERT INTO dataMhs VALUES('$nim','$nama','$email','$jurusan','$status',$angkatan)";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Mahasiswa</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Tambah Mahasiswa</h2>
  <div class="container">
    <form method="POST">
      NIM: <input type="text" name="NIM" required><br><br>
      Nama: <input type="text" name="Nama" required><br><br>
      Email: <input type="email" name="email" required><br><br>
      Jurusan: <input type="text" name="jurusan"><br><br>
      Status: <input type="text" name="status"><br><br>
      Angkatan: <input type="number" name="angkatan"><br><br>
      <button type="submit" class="button">Simpan</button>
      <a href="index.php" class="button">Batal</a>
    </form>
  </div>
</body>
</html>
