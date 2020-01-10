<?php

    include '../../konek.php';

    $tgl = date('Y-m-d');

    $sql = $konek->query("SELECT COUNT(*) AS stok FROM `master_barang` WHERE tgl_up = '$tgl'");

    $data = $sql->fetch_assoc();
    echo json_encode($data);

?>