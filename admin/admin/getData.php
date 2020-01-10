<?php

    include '../../konek.php';

    $sql = $konek->query("SELECT * FROM `admin`");
    $result = array('data'=>array());
    $no = 1;

    while($get = $sql->fetch_assoc())
    {
        $opsi = '
		<div class="btn-group">
		  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
		    <li><a type="button" data-toggle="modal" data-target="#exampleModalLong" onclick="getDetail('.$get['id_admin'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
		    <li><a type="button" onclick="deleteAdmin('.$get['id_admin'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		  </ul>
		</div>
            ';

        $foto = '<img height="25px" width="25px" src="admin/img/'.$get['foto'].'">';

        $result['data'][] = [
            $no++,
            $get['nama_admin'],
            $get['email_admin'],
            $foto,
            $opsi
        ];
    }

    echo json_encode($result);

?>