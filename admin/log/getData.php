<?php

    include '../../konek.php';

    $sql    = $konek->query("SELECT * FROM `log` ");
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
		    <li><a type="button" data-toggle="modal" data-target="#exampleModalLong" onclick="getUpdate('.$get['id_log'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
		    <li><a type="button" onclick="deleteBarang('.$get['id_log'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
		  </ul>
		</div>
            ';
            
        $result['data'][] = [
            $no++,
            $get['keterangan'],
            $get['data_lama'],
            $get['data_baru'],
            $opsi
        ];
    }

    echo json_encode($result);

?>