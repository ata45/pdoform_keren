<?php
    header('Location: view.php');
    include $_SERVER['DOCUMENT_ROOT']."/pdoform/assets/database/connection.php";

    $fn = $_POST['full_name'];
    $sn = $_POST['street'];
    $ct = $_POST['city'];
    $pr = $_POST['province'];
    $pc = $_POST['postal_code'];
    $co = $_POST['contact'];

    $sql = 'INSERT INTO biodata(full_name, street, city, province, postal_code, contact) VALUES(?, ?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$fn, $sn, $ct, $pr, $pc, $co]);
?>