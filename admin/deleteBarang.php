<?php
    include '../konek.php';

    $id = $_POST['id'];
    $result['pesan'] = '';

    $sql = $konek->query("DELETE FROM barang WHERE id_barang = $id ");
    if($sql)
    {
        $result['pesan'] = 'Data Berhasil Dihapus';
    }
    else{
        $result['pesan'] = 'Data gagal dihapus';
    }

    echo json_encode($result);
?>