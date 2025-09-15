<?php
include '../db.php';

// ambil data mahasiswa
$result = $conn->query("SELECT * FROM dataMhs");
if(!$result){
  die("Query gagal: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <div class="main-content">
    <div class="content-wrapper">

      <!-- header row: title + actions -->
      <div class="header-row">
        <h2>Data Mahasiswa</h2>
        <div class="top-actions">
          <a href="../index.php" class="button secondary">Dashboard</a>
          <a href="create.php" class="button">Tambah Mahasiswa</a>
        </div>
      </div>

      <!-- table card -->
      <div class="table-card">
        <div class="table-wrap">
          <table class="styled-table" role="table" aria-label="Daftar Mahasiswa">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Angkatan</th>
                <th style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['NIM']) ?></td>
                <td><?= htmlspecialchars($row['Nama']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td><?= htmlspecialchars($row['status']) ?></td>
                <td><?= htmlspecialchars($row['angkatan']) ?></td>
                <td style="text-align:center;">
                  <a href="edit.php?nim=<?= urlencode($row['NIM']) ?>" class="action-btn edit">Edit</a>
                  <a href="delete.php?nim=<?= urlencode($row['NIM']) ?>" class="action-btn delete btn-delete">Delete</a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div> <!-- /content-wrapper -->
  </div> <!-- /main-content -->

<script>
// Konfirmasi hapus
document.addEventListener('click', function(e){
  const el = e.target;
  if(el.classList.contains('btn-delete')){
    const ok = confirm('Yakin ingin menghapus data mahasiswa ini? Tindakan ini tidak bisa dikembalikan.');
    if(!ok) e.preventDefault();
  }
});
</script>

</body>
</html>
