<?php

    include '../../konek.php';

    $sql    = $konek->query("SELECT * FROM barang");
    $result = array('data' => array());

    $no = 1;
    while($get = $sql->fetch_assoc())
    {
        $opsi = '<button data-toggle="modal" onclick="MgetStock('.$get['id_barang'].')" data-target="#exampleModalLong" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></button>';
        $result['data'][] = [
            $no++,
            $get['nama_barang'],
            $get['stok'],
            'Rp '.number_format($get['harga_barang']),
            $opsi
        ];
    }

    echo json_encode($result);

?>