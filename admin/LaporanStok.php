<?php
    include '../konek.php';
    $sql = $konek->query("SELECT * FROM `master_barang` ORDER BY tgl_up desc");
?>


        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Semua</a></li>
              <li><a href="#tab_2" data-toggle="tab">Hari Ini</a></li>
              <li><a href="#tab_3" data-toggle="tab">Filter Waktu</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <table id="table-laporan-stok" class="table table-bordered table-hover">
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
              </div>
              <div class="tab-pane" id="tab_2">
                <?php include 'laporan/StokHariIni.php'; ?>
              </div>
              <div class="tab-pane" id="tab_3">
              <?php include 'laporan/LSD.php'; ?>
              </div>
            </div>
        </div>
<script>
var LStok;
    $(document).ready(function(){
        LStok = $('#table-laporan-stok').DataTable();
    });

</script>