<?php
session_start();
    include 'konek.php';

    if(isset($_SESSION['kasir'])){
        $inv    = $_POST['invoice'];
        $sub    = $_POST['subtotal'];
        $diskon = $_POST['diskon'];
        $total  = $_POST['totalbayar'];
        $tgl    = date('Y-m-d H:i:s');
        $admin  = $_SESSION['user'];

        $sql    = $konek->query("INSERT INTO `orders_detail`(`id_admin`, `invoice`, `sub_total`,`diskon`, `total`, `create_at`) VALUES ('$admin','$inv','$sub','$diskon','$total','$tgl')");
        $newid  = $konek->insert_id;

        foreach($_SESSION['kasir'] as $data)
        {   
            $idbarang   = $data['id'];
            $diskon     = $data['diskon'];
            $jumlah     = $data['jumlah'];
            $harga      = $data['harga'];
            $subtotal   = $data['harga'] * $data['jumlah'];
            
            $res = $konek->query("INSERT INTO `orders`(`id_detail_orders`, `id_barang`, `jumlah`, `diskon`, `sub_total`) VALUES ('$newid','$idbarang','$jumlah','$diskon','$subtotal')");

            $query = $konek->query("SELECT * FROM barang WHERE id_barang = $idbarang");
            $stok = $query->fetch_assoc();

            $data = $stok['stok'] - $jumlah;
            $konek->query("UPDATE `barang` SET `stok` = $data WHERE id_barang = $idbarang");
        }
    }
    header("Location:reset.php");
?>