<?php
    include ("assets/database/connection.php");
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
        <h3 class="mt-3 mb-3">Form Input Biodata</h3>
        <form action="store.php" method="post">
            <div class="form-group">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" class="form-control" id="inputName" placeholder="Nama Lengkap" name="full_name" autofocus>
            </div>
            <div class="form-group">
                <label for="inputAddress">Alamat</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Nama Jalan dan Nomornya" name="street">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Kota/Kabupaten</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Kota atau Kabupaten" name="city">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputProvince">Province</label>
                    <input type="text" class="form-control" id="inputProvince" placeholder="Provinsi" name="province">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Kode Pos</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Ex: 45556" name="postal_code">
                </div>
            </div>
            <div class="form-group">
                <label for="inputContact">Kontak</label>
                <input type="text" class="form-control" id="inputContact" placeholder="Nomor Kontak" name="contact">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
