<?php
include '../konek.php';

    $nama   = htmlspecialchars($_POST['nama']);
    $harga  = htmlspecialchars($_POST['harga']);
    $stok   = htmlspecialchars($_POST['stok']);
    $id     = htmlspecialchars($_POST['id']);
    $kat    = htmlspecialchars($_POST['kategori']);

    $result= array();

    if($nama == '')
    {
        $result['pesan'] = "Nama Barang Kosong";
    }
    elseif($harga == '')
    {
        $result['pesan'] = "Harga Tidak boleh kosong";
    }
    elseif($stok == '')
    {
        $result['pesan'] = 'Stok tidak boleh kosong';
    }
    else
    {
        $sql = $konek->query("UPDATE `barang` SET `nama_barang`='$nama',`stok`='$stok',`id_kategori` = '$kat',`harga_barang`='$harga' WHERE id_barang = $id ");

        if($sql)
        {
            $result['pesan'] = 'Sukses Update data';
        }
        else
        {
            $result['pesan'] = 'Gagal Update data';
        }
    }

    echo json_encode($result);

?>