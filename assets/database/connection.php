<?php

$host = 'localhost';
$password = '';
$user = 'root';
$dbname = 'db_pdoform';

/* Setting DSN (Data Source Name) */
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

/* Membuat Instance PDO */
$pdo = new PDO($dsn, $user, $password);

/* Membuat Instance PDO Default Menjadi Fetch Object */
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>