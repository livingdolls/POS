<?php

    include '../../konek.php';

    $supplier   = htmlspecialchars($_POST['supplier']);
    $email      = htmlspecialchars($_POST['email']);
    $hp         = htmlspecialchars('62'.$_POST['hp']);
    $alamat     = htmlspecialchars($_POST['alamat']);

    $result['pesan'] = '';

    if($supplier == '')
    {
        $result['pesan'] = "Supplier Kosong";
    }
    else
    {
        $sql = $konek->query("INSERT INTO `supplier`(`supplier`, `email`, `hp`, `alamat`) VALUES ('$supplier','$email','$hp','$alamat')");
        if($sql)
        {
            $result['pesan'] = 'Sukses Tambah Supplier';
        }
        else
        {
            $result['pesan'] = 'Gagal';
        }
    }

    echo json_encode($result);

?>