<?php

    
    $tgl = date('Y-m-d');
    $sql = $konek->query("SELECT * FROM `master_barang` WHERE tgl_up = '$tgl'");

?>
<table id="table-laporan-hariini" class="table table-bordered table-hover">
              <thead>
              <tr>
                  <th>No</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Supplier</th>
                  <th>Status</th>
                  <th>Keterangan</th>
              </tr>
              </thead>
              <tbody id="LSBarisBaru">
                <?php $no = 1; foreach($sql as $data) : ?>
                <?php 
                    $idbr = $data['id_barang'];
                    $dtbarang = $konek->query("SELECT * FROM `barang` WHERE id_barang = $idbr");
                    $nmbarang = $dtbarang->fetch_assoc();
                    $namabarang = $nmbarang['nama_barang'];

                    $idsup = $data['id_supplier'];
                    $dtsup = $konek->query("SELECT * FROM `supplier` WHERE id_supplier = $idsup");
                    $nmsup = $dtsup->fetch_assoc();
                    $namasup = $nmsup['supplier'];
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $namabarang; ?></td>
                    <td><?= $data['jumlah']; ?></td>
                    <td><?= $data['tgl_up']; ?></td>
                    <td><?= $namasup; ?></td>
                    <?php if($data['status'] == 'Masuk') : ?>
                    <td><span class="label label-success"><?= $data['status']; ?></span></td>
                    <?php else : ?>
                    <td><span class="label label-danger"><?= $data['status']; ?></span></td>
<?php endif; ?>
                    <td><?= $data['keterangan']; ?></td>
                </tr>
<?php endforeach;?>
            </tbody>
            </table>

<script>
$(document).ready(function(){
    $('#table-laporan-hariini').DataTable();
})
</script>