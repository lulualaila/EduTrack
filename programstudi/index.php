<?php
include '../db.php';

// ambil data program studi
$result = $conn->query("SELECT * FROM programStudi");
if(!$result){
  die("Query gagal: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Program Studi</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <div class="main-content">
    <div class="content-wrapper">

      <!-- header row: title + actions -->
      <div class="header-row">
        <h2>Data Program Studi</h2>
        <div class="top-actions">
          <a href="../index.php" class="button secondary">Dashboard</a>
          <a href="create.php" class="button">Tambah Program Studi</a>
        </div>
      </div>

      <!-- table card -->
      <div class="table-card">
        <div class="table-wrap">
          <table class="styled-table" role="table" aria-label="Daftar Program Studi">
            <thead>
              <tr>
                <th>Kode Prodi</th>
                <th>Nama Prodi</th>
                <th>Fakultas</th>
                <th style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($row['kodeProdi']) ?></td>
                <td><?= htmlspecialchars($row['namaProdi']) ?></td>
                <td><?= htmlspecialchars($row['Fakultas']) ?></td>
                <td style="text-align:center;">
                  <a href="edit.php?kode=<?= urlencode($row['kodeProdi']) ?>" class="action-btn edit">Edit</a>
                  <a href="delete.php?kode=<?= urlencode($row['kodeProdi']) ?>" class="action-btn delete btn-delete">Delete</a>
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
    const ok = confirm('Yakin ingin menghapus data program studi ini? Tindakan ini tidak bisa dikembalikan.');
    if(!ok) e.preventDefault();
  }
});
</script>

</body>
</html>