<?php
include '../db.php';
$nim = $_GET['nim'];
$result = $conn->query("SELECT * FROM dataMhs WHERE NIM='$nim'");
$row = $result->fetch_assoc();
if($_POST){
  $nama = $_POST['Nama'];
  $email = $_POST['email'];
  $jurusan = $_POST['jurusan'];
  $status = $_POST['status'];
  $angkatan = $_POST['angkatan'];
  $sql = "UPDATE dataMhs SET Nama='$nama', email='$email', jurusan='$jurusan', status='$status', angkatan=$angkatan WHERE NIM='$nim'";
  $conn->query($sql);
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Mahasiswa</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Edit Mahasiswa</h2>
  <div class="container">
    <form method="POST">
      Nama: <input type="text" name="Nama" value="<?= $row['Nama'] ?>"><br><br>
      Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br><br>
      Jurusan: <input type="text" name="jurusan" value="<?= $row['jurusan'] ?>"><br><br>
      Status: <input type="text" name="status" value="<?= $row['status'] ?>"><br><br>
      Angkatan: <input type="number" name="angkatan" value="<?= $row['angkatan'] ?>"><br><br>
      <button type="submit" class="button">Update</button>
      <a href="index.php" class="button">Batal</a>
    </form>
  </div>
</body>
</html>
