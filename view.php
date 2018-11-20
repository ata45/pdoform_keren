<?php
include ("assets/database/connection.php");
// include $_SERVER['DOCUMENT_ROOT']."/pdoform/assets/database/connection.php";
$page = isset($_GET["view"]) ? (int)$_GET["view"] : 1;
$limit = 2;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$sql = "SELECT *FROM biodata LIMIT $mulai, $limit";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$no = $mulai+1;
$bios = $stmt->fetchAll();

// $result =mysql_query('SELECT * FROM biodata');
// $total = mysqli_num_rows($sql);
// $pages = ceil($total/$halaman);
// $query = mysql_query("select * from biodata LIMIT $mulai, $halaman")or die(mysql_error);
// $no =$mulai+1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form PDO</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/mycss.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Form</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.php">Lihat Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h3 class="mt-3 mb-3">Tabel Biodata</h3>
    <div class="table-responsive">
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope='col'>ID</th>
            <th scope='col'>NAMA LENGKAP</th>
            <th scope='col'>KONTAK</th>
            <th scope='col'>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($bios as $bio){
            ?>
            <tr>
              <td><?php echo $no ?></td>
              <th scope='row'><a href="detail.php?id=<?php echo $bio->id; ?>"><?php echo $bio->id; ?></a></th>
              <td><?php echo $bio->full_name; ?></td>
              <td><?php echo $bio->contact; ?></td>
              <td>
                <a href="edit.php?id=<?php echo $bio->id; ?>">Ubah</a>
                <a href="delete.php?id=<?php echo $bio->id; ?>">Hapus</a>
              </td>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
    <ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="view.php?page=1">First</a></li>
          <li><a href="view.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>

        <!-- LINK NUMBER -->
        <?php
        // Buat query untuk menghitung semua jumlah data
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM biodata");
        $a = $sql2->execute(); // Eksekusi querynya
        //$get_jumlah = $a->fetchAll();

        $jumlah_page = ceil($a / $limit); // Hitung jumlah halamannya
        $jumlah_number = 2; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="view.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>

        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="view.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="view.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>
  </div>
</body>
</html>
