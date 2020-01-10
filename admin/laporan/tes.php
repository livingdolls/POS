<?php

    include '../../konek.php';

    $start  = $_GET['start'].' 00:00:00';
    $end    = $_GET['end'].' 23:59:59';

    $sql = $konek->query("SELECT * FROM `orders_detail` WHERE create_at BETWEEN '$start' and '$end'");
    $result = array();

    $sum = 0;

    foreach ($sql as $key) {
        $sum += $key['total'];
    }

    $result = [
        'uang' => number_format($sum)
    ];
    
    echo json_encode($result);

?>