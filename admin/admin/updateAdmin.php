<?php

include '../../konek.php';

    $nama   = htmlspecialchars($_POST['nama']);
    $email  = htmlspecialchars($_POST['email']);
    $pass   = htmlspecialchars($_POST['password']);
    $level  = htmlspecialchars($_POST['level']);
    $id     = htmlspecialchars($_POST['id_admin']);



    $nmft =  $_FILES['foto']['name'];
    $szft =  $_FILES['foto']['size'];
    $errft = $_FILES['foto']['error'];
    $pthft = $_FILES['foto']['tmp_name'];

    $result['pesan'] = '';

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
        else
        {

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
                                $foto = mysqli_query($konek,"SELECT * FROM `admin` WHERE id_admin = $id");
                                $data = mysqli_fetch_array($foto);
                                unlink("img/".$data['foto']);
                                $foto = $nmbr;
                                $data = $konek->query("UPDATE `admin` SET `nama_admin`='$nama',`email_admin`='$email',`password`='$pass',`level`='$level',`foto`='$foto' WHERE id_admin = '$id'");
                                $result['pesan'] = 'Berhasil di Update'; 
                            }
                            else
                            {
                                $result['pesan'] = 'Gagal';
                            }
                        }
                        else
                        {
                            $result['pesan'] = 'Format file tidak didukung';
                        }
                    }
                    else
                    {
                        $result['pesan'] = 'Max Size 2MB';
                    }
                
            }
            else
            {
                $sql = $konek->query("UPDATE `admin` SET `nama_admin`='$nama',`email_admin`='$email',`password`='$pass',`level`='$level' WHERE id_admin = $id");
                if($sql)
                {
                    $result['pesan'] = 'Sukses Update';
                }
                else
                {
                    $result['pesan'] = 'Gagal';
                }
            }

        }
    echo json_encode($result);
?>