<?php

    include '../../konek.php';

    $tgl = date('Y-m-d');

    $sql = $konek->query("SELECT * FROM `orders_detail` WHERE create_at LIKE '%$tgl%' ");
    $result = array('data' => array());
    $no = 1;

    while($get = $sql->fetch_assoc())
    {
        $idbar  = $get['id_admin'];
        $query  = $konek->query("SELECT * FROM `admin` WHERE id_admin = $idbar");
        $bar    = $query->fetch_assoc();
        $opsi = '
		<div class="btn-group">
        <button class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#modal-default" onclick="detailOrder('.$get['id_orders_detail'].')">Detail</button>
		</div>
            ';

        $result['data'][] = [   
            $no++,
            $bar['nama_admin'],
            $get['invoice'],
            number_format($get['sub_total']),
            $get['diskon'],
            number_format($get['total']),
            $get['create_at'],
            $opsi
        ];
    }

    echo json_encode($result);

?>