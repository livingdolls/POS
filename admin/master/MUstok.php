<?php
    include '../../konek.php';

    $keterangan     = $_POST['keterangan'];
    $stok           = $_POST['stok'];
    $id             = $_POST['id'];
    $date           = date('Y-m-d');
    $sup            = $_POST['supplier'];

    // Get Stok Terakhir
    $query = $konek->query("SELECT * FROM barang WHERE id_barang = $id");
    $stokakhir = $query->fetch_assoc();
    $re = $stokakhir['stok'];
    $hrg = $stokakhir['harga_barang'];

    $status = '';

    if($stok < 0)
    {
        $status = 'Keluar';
    }
    elseif($stok > 0)
    {
        $status = 'Masuk';
    }
    else
    {
        die();
    }

    $newstok = $re + $stok;
    $result['pesan'] = '';

    if($keterangan == '')
    {
        $result['pesan'] = "Masukkan Keterangan";
    }
    elseif($stok == '')
    {
        $result['pesan'] = "Stok Tidak boleh kosong";
    }
    else
    {
        $sql = $konek->query("INSERT INTO `master_barang`(`id_barang`,`id_supplier`, `jumlah`, `tgl_up`, `status`,`keterangan`) VALUES ('$id','$sup','$stok','$date','$status','$keterangan') ");
        $sqli = $konek->query("UPDATE `barang` SET `stok` = $newstok WHERE id_barang = $id");

        if($sql && $sqli)
        {
            $result['pesan'] = 'Sukses Update stok';
        }
        else
        {
            $result['pesan'] = 'Ada sesuatu yang salah';
        }
    }

    echo json_encode($result);


?>