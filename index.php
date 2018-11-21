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
<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Nani</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php">Home</a></li>
                <li><a href="form.php">Tambah</a></li>
                <li><a href="#">Tentang Kami</a></li>
				<li><a href="#">Kontak</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
