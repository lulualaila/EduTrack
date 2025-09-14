<?php ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title ?? "EduTrack"; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/GitHub/EduTrack/css/style.css">
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3" id="sidebar">
    <div class="sidebar-header">
      <h3 class="text-white m-0">EduTrack</h3>
      <button class="hamburger" onclick="toggleSidebar()" id="sidebarToggle">
        <i class="bi bi-list"></i>
      </button>
    </div>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="/GitHub/EduTrack/index.php"
           class="nav-link <?php echo ($menu=='dashboard')?'active':'';?>">
           <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="/GitHub/EduTrack/mahasiswa/index.php"
           class="nav-link <?php echo ($menu=='mahasiswa')?'active':'';?>">
           <i class="bi bi-people"></i> <span>Mahasiswa</span>
        </a>
      </li>
      <li>
        <a href="/GitHub/EduTrack/programstudi/index.php"
           class="nav-link <?php echo ($menu=='program')?'active':'';?>">
           <i class="bi bi-journal-bookmark"></i> <span>Program Studi</span>
        </a>
      </li>
    </ul>
  </div>

  <!-- Content -->
  <div class="content" id="content">
    <!-- Topbar -->
    <div class="topbar">
      <div class="profile">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="profile">
        <span class="fw-semibold">Admin</span>
        <i class="bi bi-caret-down-fill"></i>
      </div>
    </div>

    <?php echo $content; ?>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById("sidebar");
      const content = document.getElementById("content");

      sidebar.classList.toggle("collapsed");
      content.classList.toggle("expanded");

      // simpan state
      localStorage.setItem("sidebarCollapsed", sidebar.classList.contains("collapsed"));
    }

    document.addEventListener("DOMContentLoaded", () => {
      if (localStorage.getItem("sidebarCollapsed") === "true") {
        document.getElementById("sidebar").classList.add("collapsed");
        document.getElementById("content").classList.add("expanded");
      }
    });
  </script>
</body>
</html>
