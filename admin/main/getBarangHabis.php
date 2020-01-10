<?php

    include '../../konek.php';

    $sql    = $konek->query("SELECT * FROM barang  ORDER BY stok ASC  LIMIT 10 ");
    $result = array();

    while($get = $sql->fetch_assoc())
    {
        $idbar  = $get['id_kategori'];
        $query  = $konek->query("SELECT * FROM `kategori` WHERE id_kategori = $idbar ");
        $bar    = $query->fetch_assoc();

        $result[] = [
            'nama_barang'   => $get['nama_barang'],
            'stok'          => $get['stok'],
            'id_kategori'   => $bar['kode_kategori'],
            'harga_barang'  => number_format($get['harga_barang']),
            'id_barang'     => $get['id_barang']
        ];
    }

    echo json_encode($result);

?>