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
                        <th scope='row'><a href="detail.php?id=<?php echo $bio->id; ?>"><?php echo $bio->id; ?></a></th>
                        <td><?php echo $bio->full_name; ?></td>
                        <td><?php echo $bio->contact; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $bio->id; ?>">Ubah</a>
                            <a href="delete.php?id=<?php echo $bio->id; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <a href="form.php">Tambah</a>
    </div>
</body>
</html>
