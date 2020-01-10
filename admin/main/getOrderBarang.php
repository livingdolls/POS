<?php

    include '../../konek.php';

    $tgl = date('Y-m-d');
    $sql = $konek->query("SELECT * FROM orders_detail WHERE create_at LIKE '$tgl%____'");
    $sum = 0;
    foreach ($sql as $key) {
        $id = $key['id_orders_detail'];
        $res = $konek->query("SELECT * FROM orders WHERE id_detail_orders = $id");

        foreach($res as $d)
        {
            $sum += $d['jumlah'];
        }
    }

    echo json_encode($sum);

?>