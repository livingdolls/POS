<?php
include '../../konek.php';

if(isset($_POST['id']))
{
    $id = $_POST['id'];

    $foto = mysqli_query($konek,"SELECT * FROM `admin` WHERE id_admin = $id");
    $data = mysqli_fetch_array($foto);
    unlink("img/".$data['foto']);

    $sql = $konek->query("DELETE FROM `admin` WHERE id_admin = $id");
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
}else
{
    header("Location:../index.php?halaman=404");
}
?>