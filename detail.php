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
        <h3 class="mt-3 mb-3">Detail Biodata</h3>
        <div class="card">
            <div class="card-header">
                <?php echo $bio->full_name; ?> (<?php echo $bio->id; ?>)
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $bio->street; ?>, <?php echo $bio->city; ?>, <?php echo $bio->province; ?> - <?php echo $bio->postal_code; ?></h5>
                <p class="card-text"><?php echo $bio->contact; ?></p>
            </div>
        </div>
	<a style="color:white;" href="edit.php?id=<?php echo $bio->id; ?>">
                        <button type="button" class="btn btn-primary">Ubah</button>
                            </a>
                            <a style="color:white;" href="delete.php?id=<?php echo $bio->id; ?>">
                            <button type="button" class="btn btn-danger">Hapus</button>
                            </a>
    </div>
</body>
</html>
