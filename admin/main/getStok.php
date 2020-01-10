<?php

    include '../../konek.php';

    $sql    = $konek->query("SELECT * FROM master_barang WHERE `status` = 'Masuk' ORDER BY tgl_up DESC LIMIT 10");
    $result = array();

    while($get = $sql->fetch_assoc())
    {
        $idbar  = $get['id_barang'];
        $query  = $konek->query("SELECT * FROM `barang` WHERE id_barang = $idbar");
        $bar    = $query->fetch_assoc();

        $result[] = 
        [
            'nama_barang'   => $bar['nama_barang'],
            'jumlah'        => $get['jumlah'],
            'status'        => $get['status']
        ];
    }

    echo json_encode($result);

?>