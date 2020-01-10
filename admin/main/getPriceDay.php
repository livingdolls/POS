<?php

    include '../../konek.php';

    $tgl = date('Y-m-d');
    $sql = $konek->query("SELECT * FROM orders_detail WHERE create_at LIKE '$tgl%____'");
    $sum = 0;
    $result = array();

    foreach ($sql as $key) {
        $sum += $key['total'];
    }

    $result = [
        'uang' => number_format($sum)
    ];

    echo json_encode($result);
?>