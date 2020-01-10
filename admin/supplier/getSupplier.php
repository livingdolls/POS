<?php

    include '../../konek.php';

    $sql = $konek->query("SELECT * FROM `supplier`");
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
		    <li><a type="button" data-toggle="modal" data-target="#exampleModalLong" onclick="getDetailSupplier('.$get['id_supplier'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
		    <li><a type="button" onclick="deleteSupplier('.$get['id_supplier'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		  </ul>
		</div>
            ';

        $result['data'][] = [
            $no++,
            $get['supplier'],
            $get['email'],
            $get['hp'],
            $get['alamat'],
            $opsi
        ];
    }

    echo json_encode($result);

?>