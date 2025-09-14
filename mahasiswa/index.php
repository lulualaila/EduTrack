<?php 
include '../db.php';
$menu = "mahasiswa";
$title = "Data Mahasiswa";
ob_start();
?>
<h2>Data Mahasiswa</h2>
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>NIM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Status</th>
      <th>Angkatan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM dataMhs");
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>{$row['NIM']}</td>
                <td>{$row['Nama']}</td>
                <td>{$row['email']}</td>
                <td>{$row['jurusan']}</td>
                <td>{$row['status']}</td>
                <td>{$row['angkatan']}</td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='6' class='text-center'>Belum ada data</td></tr>";
    }
    ?>
  </tbody>
</table>
<?php
$content = ob_get_clean();
include '../layout.php';
?>
