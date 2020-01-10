<?php

include 'konek.php';
  session_start();

    $namabarang = $_POST['namabarang'];
    $harga      = $_POST['harga'];
    $jumlah     = $_POST['qty'];
    $diskon     = $_POST['diskon'];
    $id         = $_POST['id'];

    $sql = mysqli_query($konek,"SELECT * FROM barang WHERE id_barang = $id ");
    $ba = mysqli_fetch_array($sql);

    if(empty($diskon))
    {
      $diskon = 0;
    }

    if(isset($_SESSION['kasir'][$id])){
          $_SESSION['kasir'][$id] = [
              'namabarang'  => $namabarang,
              'harga'       => $harga,
              'diskon'      => $diskon,
              'jumlah'      => $_SESSION['kasir'][$id]['jumlah'] + $jumlah,
              'stok'        => $ba['stok'],
              'id'          => $id
          ];
      }
      else{
          $_SESSION['kasir'][$id] = [
              'namabarang'  => $namabarang,
              'harga'       => $harga,
              'jumlah'      => $jumlah,
              'diskon'      => $diskon,
              'stok'        => $ba['stok'],
              'id'          => $id
          ];
      }

      header("Location:index.php");

?>