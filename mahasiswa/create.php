<?php
// create.php
include '../db.php';
$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $nim = $conn->real_escape_string(trim($_POST['NIM']));
  $nama = $conn->real_escape_string(trim($_POST['Nama']));
  $email = $conn->real_escape_string(trim($_POST['email']));
  $jurusan = $conn->real_escape_string(trim($_POST['jurusan']));
  $status = $conn->real_escape_string(trim($_POST['status']));
  $angkatan = (int)$_POST['angkatan'];

  if($nim === '' || $nama === '' || $email === '' || $status === '' || $angkatan === 0){
    $error = "Mohon lengkapi semua field yang wajib.";
  } else {
    // Cek apakah NIM sudah ada
    $check_sql = "SELECT * FROM dataMhs WHERE NIM = '$nim'";
    $check_result = $conn->query($check_sql);
    
    if($check_result->num_rows > 0) {
      $error = "NIM sudah terdaftar. Gunakan NIM yang berbeda.";
    } else {
      $sql = "INSERT INTO dataMhs (NIM, Nama, email, jurusan, status, angkatan) VALUES('$nim','$nama','$email','$jurusan','$status',$angkatan)";
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
  <title>Tambah Mahasiswa</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="main-content">
    <div class="content-wrapper" style="max-width:760px; margin-top:18px;">
      <!-- Header dihapus dari sini dan dipindahkan ke dalam card -->

      <div class="form-card">
        <!-- Judul dimasukkan ke dalam card -->
        <div class="header-row" style="justify-content:center; margin-bottom:20px;">
          <h2>Tambah Mahasiswa</h2>
        </div>

        <?php if($error): ?>
          <div class="error-message">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <form method="POST" class="form-grid" novalidate>
          <label for="NIM">NIM:</label>
          <div class="form-row">
            <input id="NIM" type="text" name="NIM" required>
          </div>

          <label for="Nama">Nama:</label>
          <div class="form-row">
            <input id="Nama" type="text" name="Nama" required>
          </div>

          <label for="email">Email:</label>
          <div class="form-row">
            <input id="email" type="email" name="email" required>
          </div>

          <label for="jurusan">Jurusan:</label>
          <div class="form-row">
            <input id="jurusan" type="text" name="jurusan">
          </div>

          <label for="status">Status:</label>
          <div class="form-row">
            <select id="status" name="status" class="input-select" required>
              <option value="">-- Pilih Status --</option>
              <option value="Aktif">Aktif</option>
              <option value="Cuti">Cuti</option>
              <option value="Lulus">Lulus</option>
              <option value="Dropout">Dropout</option>
            </select>
          </div>

          <label for="angkatan">Angkatan:</label>
          <div class="form-row">
            <select id="angkatan" name="angkatan" class="input-select" required>
              <option value="">-- Pilih Angkatan --</option>
              <?php for($y=2018;$y<=2026;$y++): ?>
                <option value="<?= $y ?>"><?= $y ?></option>
              <?php endfor; ?>
            </select>
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