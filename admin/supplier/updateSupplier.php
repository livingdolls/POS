<?php

    include '../../konek.php';

    $supplier   = htmlspecialchars($_POST['supplier']);
    $email      = htmlspecialchars($_POST['email']);
    $hp         = htmlspecialchars('62'.$_POST['hp']);
    $alamat     = htmlspecialchars($_POST['alamat']);
    $id         = htmlspecialchars($_POST['idSupplier']);

    $result['pesan'] = '';

    if($supplier == '')
    {
        $result['pesan'] = "Supplier Kosong";
    }
    else
    {
        $sql = $konek->query("UPDATE `supplier` SET `supplier`='$supplier',`email`='$email',`hp`='$hp',`alamat`='$alamat' WHERE id_supplier = $id");
        if($sql)
        {
            $result['pesan'] = 'Sukses Update Supplier';
        }
        else
        {
            $result['pesan'] = 'Gagal';
        }
    }

    echo json_encode($result);

?>