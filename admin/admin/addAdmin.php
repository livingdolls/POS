<?php
include '../../konek.php';

if(isset($_POST['nama']))
{
    $nama   = htmlspecialchars($_POST['nama']);
    $email  = htmlspecialchars($_POST['email']);
    $pass   = htmlspecialchars($_POST['password']);
    $level  = htmlspecialchars($_POST['akseslevel']);
    $date = date('Y-m-d');
    $nmft =  $_FILES['foto']['name'];
    $szft =  $_FILES['foto']['size'];
    $errft = $_FILES['foto']['error'];
    $pthft = $_FILES['foto']['tmp_name'];

    if($nama == '')
    {
        $result['pesan'] = 'Nama Kosong';
    }
    elseif($email == '')
    {
        $result['pesan'] = 'Email Kosong';
    }
    elseif($pass == '')
    {
        $result['pesan'] = 'Password Kosong';
    }
    else{

    if($errft == 0)
    {
        if($szft <= 2000000)
        {
            $format = pathinfo($nmft,PATHINFO_EXTENSION);
            if(($format == "jpg") or ($format == "png") or ($format == "jpeg"))
            {
                $temp = explode(".",$nmft);
                $nmbr = "Admin-".round(microtime(true)) . '.' . end($temp);
                $uplod = move_uploaded_file($pthft, 'img/' . $nmbr);

                if($uplod == true)
                {
                    $foto = $nmbr;
                    $data = $konek->query("INSERT INTO `admin`(`nama_admin`, `email_admin`, `password`, `foto`,`level`, `create_at`) VALUES ('$nama','$email','$pass','$foto','$level','$date')");
                    $result['pesan'] = 'Berhasil di tambah'; 
                }
                else
                {
                    $result['pesan'] = 'Gagal';
                }
            }
            else
            {
                $result['pesan'] = 'Jenis file tidak didukung';
            }
        }
        else
        {
            $result['pesan'] = 'Ukuran File Max 2MB';
        }
    }
    else
    {
        $result['pesan'] = 'Foto Kosong';
    }

}

    echo json_encode($result);
}else
{
    header("Location:../index.php?halaman=404");
}
?>