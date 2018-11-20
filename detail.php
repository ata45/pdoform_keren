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
  <nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="https://www.malasngoding.com">Malas Ngoding</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="https://www.malasngoding.com">Home <span class="sr-only">(current)</span></a></li>
				<li><a href="#">Profil</a></li>
				<li><a href="#">Tentang Kami</a></li>
				<li><a href="#">Kontak</a></li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Tutorial
					<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">HTML</a></li>
						<li><a href="#">CSS</a></li>
						<li><a href="#">Bootstrap</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
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
    </div>
</body>
</html>
