<?php
include '../db.php';
$error = '';
$success = '';

// Ambil data program studi berdasarkan kode
$kode = isset($_GET['kode']) ? $conn->real_escape_string(trim($_GET['kode'])) : '';
$sql = "SELECT * FROM programStudi WHERE kodeProdi = '$kode'";
$result = $conn->query($sql);

if($result->num_rows === 0) {
  header("Location: index.php");
  exit;
}

$prodi = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $kode_baru = $conn->real_escape_string(trim($_POST['kodeProdi']));
  $nama = $conn->real_escape_string(trim($_POST['namaProdi']));
  $fak = $conn->real_escape_string(trim($_POST['Fakultas']));

  if($kode_baru === '' || $nama === '' || $fak === ''){
    $error = "Mohon lengkapi semua field yang wajib.";
  } else {
    // Cek apakah kode baru sudah digunakan oleh program studi lain (jika kode diubah)
    if ($kode_baru !== $kode) {
      $check_sql = "SELECT * FROM programStudi WHERE kodeProdi = '$kode_baru'";
      $check_result = $conn->query($check_sql);
      
      if($check_result->num_rows > 0) {
        $error = "Kode Program Studi sudah terdaftar. Gunakan kode yang berbeda.";
      } else {
        $sql = "UPDATE programStudi SET kodeProdi='$kode_baru', namaProdi='$nama', Fakultas='$fak' WHERE kodeProdi='$kode'";
        if($conn->query($sql)){
          $success = "Data program studi berhasil diperbarui.";
          // Update kode untuk refresh data
          $kode = $kode_baru;
          $sql = "SELECT * FROM programStudi WHERE kodeProdi = '$kode'";
          $result = $conn->query($sql);
          $prodi = $result->fetch_assoc();
        } else {
          $error = "Update gagal: " . $conn->error;
        }
      }
    } else {
      // Jika kode tidak berubah, langsung update
      $sql = "UPDATE programStudi SET namaProdi='$nama', Fakultas='$fak' WHERE kodeProdi='$kode'";
      if($conn->query($sql)){
        $success = "Data program studi berhasil diperbarui.";
        // Refresh data
        $sql = "SELECT * FROM programStudi WHERE kodeProdi = '$kode'";
        $result = $conn->query($sql);
        $prodi = $result->fetch_assoc();
      } else {
        $error = "Update gagal: " . $conn->error;
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Edit Program Studi</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="main-content">
    <div class="content-wrapper" style="max-width:760px; margin-top:18px;">
      <div class="form-card">
        <!-- Judul dimasukkan ke dalam card -->
        <div class="header-row" style="justify-content:center; margin-bottom:20px;">
          <h2>Edit Program Studi</h2>
        </div>

        <?php if($error): ?>
          <div class="error-message">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>
        
        <?php if($success): ?>
          <div style="background:#e7f7ed;color:#0d6832;padding:10px;border-radius:8px;margin-bottom:14px;font-weight:600;">
            <?= htmlspecialchars($success) ?>
          </div>
        <?php endif; ?>

        <form method="POST" class="form-grid" novalidate>
          <label for="kodeProdi">Kode Prodi:</label>
          <div class="form-row">
            <input id="kodeProdi" type="text" name="kodeProdi" value="<?= htmlspecialchars($prodi['kodeProdi']) ?>" required>
          </div>

          <label for="namaProdi">Nama Prodi:</label>
          <div class="form-row">
            <input id="namaProdi" type="text" name="namaProdi" value="<?= htmlspecialchars($prodi['namaProdi']) ?>" required>
          </div>

          <label for="Fakultas">Fakultas:</label>
          <div class="form-row">
            <input id="Fakultas" type="text" name="Fakultas" value="<?= htmlspecialchars($prodi['Fakultas']) ?>" required>
          </div>

          <div class="form-actions">
            <button type="submit" class="button">Update</button>
            <a href="index.php" class="button secondary">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>