<div class="alert alert-success" role="alert" id="pesan">
        
  </div>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Master Barang</h3>
            </div>
            <div class="box-body">

              <table id="tabel-master" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Stok</th>
                          <th>Harga</th>
                          <th>Update Stok</th>
                      </tr>
                  </thead>
                  <tbody id="MasterBarang">

                  </tbody>
              </table>
              
            </div>
        </div>


        <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLong">Form Stok Barang</h3>
      </div>
      <div class="modal-body">
        <small><i><span class="label label-warning"> <b>Note : </b> Angka Mines (-) Untuk Barang Keluar</span></i></small>
</br>
      <?php
        include '../konek.php';
        $supsql = $konek->query('SELECT * FROM supplier');
      ?>
                <div class="form-group">
                  <label for="stok">Stok Barang</label>
                  <input type="number" class="form-control" id="Mstok" placeholder="Stok Barang">
                </div>
                <div class="form-group">
                  <label for="Keterangan">Keterangan Barang</label>
                  <input type="hidden" id="Mid">
                  <input type="text" class="form-control" id="Mketerangan" placeholder="Keterangan">
                </div>
                <div class="form-group">
                  <label>Supplier</label>
                  
                  <select id="UMsupplier" name="supplier" class="form-control">
                    <option value="0">Tidak Ada</option>
                    <?php foreach($supsql as $supsql) : ?>
                      <option value="<?= $supsql['id_supplier']; ?>"><?= $supsql['supplier']; ?></option>
                    <?php endforeach; ?>
                   </select>
                </div>
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" onclick="MupdateStock()" class="btn btn-primary">Save changes</button>

      </div>
    </div>
  </div>
</div>
