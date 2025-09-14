<?php
include '../db.php';
$result = $conn->query("SELECT * FROM programStudi");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Program Studi</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <h2>Program Studi</h2>
  <div class="container">
    <a href="create.php" class="button">+ Tambah Program Studi</a>
    <a href="../index.php" class="button">⬅ Dashboard</a>
    <table>
      <tr><th>Kode Prodi</th><th>Nama Prodi</th><th>Fakultas</th><th>Aksi</th></tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['kodeProdi'] ?></td>
        <td><?= $row['namaProdi'] ?></td>
        <td><?= $row['Fakultas'] ?></td>
        <td>
          <a href="edit.php?kode=<?= $row['kodeProdi'] ?>" class="button">Edit</a>
          <a href="delete.php?kode=<?= $row['kodeProdi'] ?>" class="button" style="background-color:red;">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
