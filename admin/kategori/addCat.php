<?php
    include '../../konek.php';

    $nama       = htmlspecialchars($_POST['namakategori']);
    $newname    = str_replace(' ','',$nama);
    $kode       = strtoupper(substr($newname,0,3));
    $result['pesan'] = '';

    if($nama == '')
    {
        $result['pesan'] = "Nama Tidak Boleh Kosong";
    }
    else
    {
        $sql = $konek->query("INSERT INTO `kategori`(`nama_kategori`, `kode_kategori`) VALUES ('$nama','$kode') ");
        if($sql)
        {
            $result['pesan'] = 'Sukses tambah data';
        }
        else
        {
            $result['pesan'] = 'Gagal tambah data';
        }
    }

    echo json_encode($result);

?>