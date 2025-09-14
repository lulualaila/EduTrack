<?php 
include '../db.php';
$menu = "program";
$title = "Program Studi";
ob_start();
?>
<h2>Program Studi</h2>
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>Kode Prodi</th>
      <th>Nama Prodi</th>
      <th>Fakultas</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM programStudi");
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>{$row['kodeProdi']}</td>
                <td>{$row['namaProdi']}</td>
                <td>{$row['Fakultas']}</td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='3' class='text-center'>Belum ada data</td></tr>";
    }
    ?>
  </tbody>
</table>
<?php
$content = ob_get_clean();
include '../layout.php';
?>
