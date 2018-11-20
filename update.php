<?php
    header('Location: view.php');
    include ("assets/database/connection.php");
    //include $_SERVER['DOCUMENT_ROOT']."/pdoform/assets/database/connection.php";

    $id = $_POST['id'];
    $fn = $_POST['full_name'];
    $sn = $_POST['street'];
    $ct = $_POST['city'];
    $pr = $_POST['province'];
    $pc = $_POST['postal_code'];
    $co = $_POST['contact'];

    $sql = 'UPDATE biodata SET full_name = :fn, street = :sn, city = :ct, province = :pr, postal_code = :pc, contact = :co WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'fn' => $fn, 'sn' => $sn, 'ct' => $ct, 'pr' => $pr, 'pc' => $pc, 'co' => $co]);
?>
