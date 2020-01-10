<?php

include '../../konek.php';
    $id = $_GET['id'];

    $sql = $konek->query("SELECT * FROM `orders` WHERE id_detail_orders = $id");
    $result = array();

    while($data = $sql->fetch_assoc()){
        $idbar  = $data['id_barang'];
        $query  = $konek->query("SELECT * FROM `barang` WHERE id_barang = $idbar");
        $bar    = $query->fetch_assoc();

        $result[] = [
            'barang'    => $bar['nama_barang'],
            'jumlah'    => $data['jumlah'],
            'diskon'    => $data['diskon'],
            'sub_total' => number_format($data['sub_total'])
        ];
    }

    echo json_encode($result);
?>