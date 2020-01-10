<?php
    include 'konek.php';

    $nama = $_GET['namabarang'];

    $sql = mysqli_query($konek,"SELECT * FROM barang WHERE nama_barang = '$nama' ");
    $ba = mysqli_fetch_array($sql);

    $data = [
        'id'    => $ba['id_barang'],
        'nama'  => $ba['nama_barang'],
        'harga' => $ba['harga_barang'],
        'stok'  => $ba['stok']
    ];

    echo json_encode($data);
?>