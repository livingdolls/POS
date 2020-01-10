<?php

    include '../../konek.php';

    $sql    = $konek->query("SELECT * FROM `orders_detail` ORDER BY create_at DESC LIMIT 10");
    $result = array();

    while($get = $sql->fetch_assoc())
    {
        $idbar = $get['id_admin'];
        $query = $konek->query("SELECT * FROM `admin` WHERE id_admin = $idbar ");
        $bar = $query->fetch_assoc();

        $result[] = [
            'invoice'   => $get['invoice'],
            'sub_total' => number_format($get['sub_total']),
            'diskon'    => $get['diskon'],
            'total'     => number_format($get['total'])
        ];
    }

    echo json_encode($result);

?>