<?php

    include '../../konek.php';

    $start  = $_GET['start'];
    $end    = $_GET['end'];

    $result = array();
    $sql = $konek->query("SELECT * FROM master_barang WHERE tgl_up BETWEEN '$start' AND '$end'");

    foreach ($sql as $key) {
        $idbr = $key['id_barang'];
        $dtbarang = $konek->query("SELECT * FROM `barang` WHERE id_barang = $idbr");
        $nmbarang = $dtbarang->fetch_assoc();
        $namabarang = $nmbarang['nama_barang'];

        $idsup = $key['id_supplier'];
        $dtsup = $konek->query("SELECT * FROM `supplier` WHERE id_supplier = $idsup");
        $nmsup = $dtsup->fetch_assoc();
        $namasup = $nmsup['supplier'];

        $result[] = [
            'barang' => $namabarang,
            'jumlah' => $key['jumlah'],
            'status' => $key['status'],
            'tgl_up' => $key['tgl_up'],
            'keterangan' => $key['keterangan'],
            'supplier' => $namasup
        ];
    }

    echo json_encode($result);

?>