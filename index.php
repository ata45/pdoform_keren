<?php
    include ("assets/database/connection.php");
    // include $_SERVER['DOCUMENT_ROOT']."/pdoform/assets/database/connection.php";

    $sql = 'SELECT * FROM biodata';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $bios = $stmt->fetchAll();
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
                        <th scope='row'><a style="color:white;" href="detail.php?id=<?php echo $bio->id; ?>"><?php echo $bio->id; ?></a></th>
                        <td>
                        <a style="color:white;" href="detail.php?id=<?php echo $bio->id; ?>">
                            <?php echo $bio->full_name; ?></td>
                            </a>
                        <td>
                        <a style="color:white;" href="detail.php?id=<?php echo $bio->id; ?>">
                        <?php echo $bio->contact; ?></td>
                        </a>
                        <td>
                        <a style="color:white;" href="edit.php?id=<?php echo $bio->id; ?>">
                        <button type="button" class="btn btn-primary">Ubah</button>
                            </a>
                            <a style="color:white;" href="delete.php?id=<?php echo $bio->id; ?>">
                            <button type="button" class="btn btn-danger">Hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <a href="form.php"><button type="button" class="btn btn-warning">Tambah</button>
</a>
    </div>
</body>
</html>
