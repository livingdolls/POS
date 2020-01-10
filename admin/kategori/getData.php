<?php

    include '../../konek.php';

    $sql = $konek->query("SELECT * FROM `kategori`");
    $result = array('data' => array());
    
    $no = 1;
    while($get = $sql->fetch_assoc())
    {
        $opsi = '
		<div class="btn-group">
		  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
		    <li><a type="button" data-toggle="modal" data-target="#exampleModalLong" onclick="getUpdateCat('.$get['id_kategori'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
		    <li><a type="button" onclick="deleteCat('.$get['id_kategori'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		  </ul>
		</div>
            ';

        $result['data'][] = [
            $no++,
            $get['nama_kategori'],
            $get['kode_kategori'],
            $opsi
        ];
    }

    echo json_encode($result);

?>