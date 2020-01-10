<?php

    include '../../konek.php';

    $sql = $konek->query("SELECT * FROM `orders_detail` ORDER BY create_at DESC");
    $result = array();

    while($get = $sql->fetch_assoc())
    {
        $idbar  = $get['id_admin'];
        $query  = $konek->query("SELECT * FROM `admin` WHERE id_admin = $idbar");
        $bar    = $query->fetch_assoc();

        $result[] = [
            'id_orders_detail'  => $get['id_orders_detail'],
            'admin'             => $bar['nama_admin'],
            'invoice'           => $get['invoice'],
            'sub_total'         => number_format($get['sub_total']),
            'diskon'            => $get['diskon'],
            'total'             => number_format($get['total']),
            'create_at'         => $get['create_at']
        ];
    }

    echo json_encode($result);

?>