<?php

    include '../../konek.php';

    $start  = $_GET['start'].' 00:00:00';
    $end    = $_GET['end'].' 23:59:59';

    $sql    = $konek->query("SELECT * FROM `orders_detail` WHERE create_at BETWEEN '$start' and '$end' ORDER BY create_at DESC");
    $result = array();

    $sum = 0;

    while($get = $sql->fetch_assoc())
    {
        $idbar = $get['id_admin'];
        $query = $konek->query("SELECT * FROM `admin` WHERE id_admin = $idbar");
        $bar = $query->fetch_assoc();

        $result[] = [
            'id_orders_detail'  => $get['id_orders_detail'],
            'admin'             => $bar['nama_admin'],
            'invoice'           => $get['invoice'],
            'sub_total'         => number_format($get['sub_total']),
            'diskon'            => $get['diskon'],
            'total'             => $get['total'],
            'create_at'         => $get['create_at'],
            'uang'              => $sum += $get['total']
        ];
    }

    echo json_encode($result);

?>