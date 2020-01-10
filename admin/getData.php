<?php

    include '../konek.php';

    $sql = $konek->query("SELECT * FROM barang ORDER BY create_at DESC");
    $result = array('data'=>array());
    $no = 1;
    while($get = $sql->fetch_assoc())
    {
        $idbar  = $get['id_kategori'];
        $query  = $konek->query("SELECT * FROM `kategori` WHERE id_kategori = $idbar");
        $bar    = $query->fetch_assoc();

        $opsi = '
		<div class="btn-group">
		  <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Action <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
		    <li><a type="button" data-toggle="modal" data-target="#exampleModalLong" onclick="getUpdate('.$get['id_barang'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
		    <li><a type="button" onclick="deleteBarang('.$get['id_barang'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		  </ul>
		</div>
            ';
            
        $result['data'][] = [
            $no++,
            $get['nama_barang'],
            $get['stok'],
            $bar['nama_kategori'],
            number_format($get['harga_barang']),
            $opsi
        ];
    }

    echo json_encode($result);

?>