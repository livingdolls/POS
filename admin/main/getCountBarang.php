<?php

    include '../../konek.php';

    $sql    = $konek->query("SELECT COUNT(*) AS barang FROM barang ");
    $result = array();

    $data = $sql->fetch_assoc();
    echo json_encode($data);

?>