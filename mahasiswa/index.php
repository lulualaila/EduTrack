<?php
include '../db.php';
$result = $conn->query("SELECT * FROM dataMhs");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Data Mahasiswa</h2>
  <div class="container">
    <a href="create.php" class="button">+ Tambah Mahasiswa</a>
    <a href="../index.php" class="button">⬅ Dashboard</a>
    <table>
      <tr><th>NIM</th><th>Nama</th><th>Email</th><th>Jurusan</th><th>Status</th><th>Angkatan</th><th>Aksi</th></tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['NIM'] ?></td>
        <td><?= $row['Nama'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['angkatan'] ?></td>
        <td>
          <a href="edit.php?nim=<?= $row['NIM'] ?>" class="button">Edit</a>
          <a href="delete.php?nim=<?= $row['NIM'] ?>" class="button" style="background-color:red;">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
