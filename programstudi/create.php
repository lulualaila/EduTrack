<?php
include '../db.php';
$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $kode = $conn->real_escape_string(trim($_POST['kodeProdi']));
  $nama = $conn->real_escape_string(trim($_POST['namaProdi']));
  $fak = $conn->real_escape_string(trim($_POST['Fakultas']));

  if($kode === '' || $nama === '' || $fak === ''){
    $error = "Mohon lengkapi semua field yang wajib.";
  } else {
    // Cek apakah kode prodi sudah ada
    $check_sql = "SELECT * FROM programStudi WHERE kodeProdi = '$kode'";
    $check_result = $conn->query($check_sql);
    
    if($check_result->num_rows > 0) {
      $error = "Kode Program Studi sudah terdaftar. Gunakan kode yang berbeda.";
    } else {
      $sql = "INSERT INTO programStudi VALUES('$kode','$nama','$fak')";
      if($conn->query($sql)){
        header("Location: index.php");
        exit;
      } else {
        $error = "Simpan gagal: " . $conn->error;
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Program Studi</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="main-content">
    <div class="content-wrapper" style="max-width:760px; margin-top:18px;">
      <div class="form-card">
        <!-- Judul dimasukkan ke dalam card -->
        <div class="header-row" style="justify-content:center; margin-bottom:20px;">
          <h2>Tambah Program Studi</h2>
        </div>

        <?php if($error): ?>
          <div class="error-message">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form method="POST" class="form-grid" novalidate>
          <label for="kodeProdi">Kode Prodi:</label>
          <div class="form-row">
            <input id="kodeProdi" type="text" name="kodeProdi" required>
          </div>

          <label for="namaProdi">Nama Prodi:</label>
          <div class="form-row">
            <input id="namaProdi" type="text" name="namaProdi" required>
          </div>

          <label for="Fakultas">Fakultas:</label>
          <div class="form-row">
            <input id="Fakultas" type="text" name="Fakultas" required>
          </div>

          <div class="form-actions">
            <button type="submit" class="button">Simpan</button>
            <a href="index.php" class="button secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>