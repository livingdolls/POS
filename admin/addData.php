<?php
    include '../konek.php';

    $nama   = htmlspecialchars($_POST['nama']);
    $harga  = htmlspecialchars($_POST['harga']);
    $stok   = htmlspecialchars($_POST['stok']);
    $date   = date('Y-m-d  h:i:s');
    $kat    = htmlspecialchars($_POST['kategori']);
    $sup    = htmlspecialchars($_POST['supplier']);
    $modal  = htmlspecialchars($_POST['modal']);

    $result['pesan'] = '';

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
    elseif($kat == '')
    {
        $result['pesan'] = 'Isi Kategori';
    }
    else
    {
        $sql = $konek->query("INSERT INTO `barang`(`nama_barang`, `stok`,`id_kategori`,`harga_barang`, `create_at`) VALUES ('$nama','$stok','$kat','$harga','$date') ");
        $new_id = $konek->insert_id;

        if($sql)
        {
            $tgl = date('Y-m-d');
            $query = $konek->query("INSERT INTO `master_barang`(`id_barang`,`id_supplier`, `jumlah`, `tgl_up`, `status`,`keterangan`) VALUES ('$new_id','$sup','$stok','$tgl','Masuk','Stok Masuk Awal') ");
            $result['pesan'] = 'Sukses tambah data';
        }
        else
        {
            $result['pesan'] = 'Gagal tambah data';
        }
    }

    echo json_encode($result);


?>