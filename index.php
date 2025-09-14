<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EduTrack Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="sidebar">
    <h2>EduTrack</h2>
    <ul>
      <li><a href="index.php" class="active">Dashboard</a></li>
      <li><a href="mahasiswa/index.php">Mahasiswa</a></li>
      <li><a href="programstudi/index.php">Program Studi</a></li>
    </ul>
  </div>

  <div class="main-content">
    <header>
      <h1>Dashboard</h1>
      <div class="user-wrapper">
        <img src="https://ui-avatars.com/api/?name=Admin" alt="user" width="40px" height="40px">
        <div>
          <h4>Admin</h4>
          <small>Administrator</small>
        </div>
      </div>
    </header>

    <main>
      <h2>Welcome to EduTrack</h2>
      <p>Kelola data akademik dengan mudah</p>

      <div class="cards">
        <div class="card">
          <h3>Data Mahasiswa</h3>
          <p>Kelola data mahasiswa</p>
          <a href="mahasiswa/index.php" class="btn">Lihat</a>
        </div>
        <div class="card">
          <h3>Program Studi</h3>
          <p>Kelola data program studi</p>
          <a href="programstudi/index.php" class="btn">Lihat</a>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
