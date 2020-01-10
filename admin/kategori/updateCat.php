<?php
    include '../../konek.php';

    $nama   = htmlspecialchars($_POST['nama']);
    $newname = str_replace(' ','',$nama);
    $kode   = strtoupper(substr($newname,0,3));
    $result['pesan'] = '';
    $id = $_POST['id'];

    if($nama == '')
    {
        $result['pesan'] = "Nama Tidak Boleh Kosong";
    }
    else
    {
        $sql = $konek->query("UPDATE `kategori` SET `nama_kategori`='$nama',`kode_kategori`='$kode' WHERE id_kategori = $id");
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