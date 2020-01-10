<?php
include '../../konek.php';

    $id = $_POST['id'];
    $sql = $konek->query("DELETE FROM `supplier` WHERE id_supplier = $id");
    $result['pesan'] = '';

    if($sql)
    {
        $result['pesan'] = 'Berhasil dihapus';
    }
    else
    {
        $result['pesan'] = 'Gagal Hapus';
    }

    echo json_encode($result);
?>