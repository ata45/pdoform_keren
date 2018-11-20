<?php
    include ("assets/database/connection.php");
    //include $_SERVER['DOCUMENT_ROOT']."/pdoform/assets/database/connection.php";

    $id = $_GET['id'];

    $sql = 'SELECT * FROM biodata WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $bio = $stmt->fetch();
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
        <h3 class="mt-3 mb-3">Form Edit Biodata</h3>
        <form action="update.php" method="post">
            <div class="form-group">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" class="form-control" id="inputName" name="full_name" value="<?php echo $bio->full_name; ?>" autofocus>
            </div>
            <div class="form-group">
                <label for="inputAddress">Alamat</label>
                <input type="text" class="form-control" id="inputAddress" Nomornya" name="street" value="<?php echo $bio->street; ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Kota/Kabupaten</label>
                    <input type="text" class="form-control" id="inputCity" name="city" value="<?php echo $bio->city; ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputProvince">Province</label>
                    <input type="text" class="form-control" id="inputProvince" name="province" value="<?php echo $bio->province; ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Kode Pos</label>
                    <input type="text" class="form-control" id="inputZip" name="postal_code" value="<?php echo $bio->postal_code; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputContact">Kontak</label>
                <input type="text" class="form-control" id="inputContact" name="contact" value="<?php echo $bio->contact; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $bio->id; ?>">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
