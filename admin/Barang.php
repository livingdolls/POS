<div class="alert alert-success" role="alert" id="pesan">        
</div>
<div class="row">
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Barang</h3>
            </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="namabarang">Nama Barang</label>
                  <input type="text" class="form-control" id="namabarang" placeholder="Masukkan Nama Barang">
                </div>
                <div class="form-group">
                  <label for="harga">Harga Jual Satuan</label>
                  <input type="number" class="form-control" id="harga" placeholder="Harga Jual Barang">
                </div>
                <div class="form-group">
                  <label for="stok">Qty</label>
                  <input type="number" class="form-control" id="stok" placeholder="Qty">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <?php 
                  include '../konek.php';
                    $sql = $konek->query("SELECT * FROM kategori");
                  ?>
                  <select id="kat" name="kategori" class="form-control">
                    <option value="0">Kategori</option>
                    <?php foreach($sql as $cat) : ?>
                      <option value="<?= $cat['id_kategori']; ?>"><?= $cat['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Supplier</label>
                  <?php 
                    $supplier = $konek->query("SELECT * FROM supplier");
                  ?>
                  <select id="supplier" name="supplier" class="form-control">
                    <option value="0">Tidak Ada</option>
                    <?php foreach($supplier as $sup) : ?>
                      <option value="<?= $sup['id_supplier']; ?>"><?= $sup['supplier']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" onclick="tambah()" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </div>

        <div class="col-md-8">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-barang" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Stok</th>
                          <th>Kategori</th>
                          <th>Harga</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody id="BarisBaru">

                  </tbody>
              </table>
            </div>
        </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLong">Form Edit Barang</h3>
      </div>
      <div class="modal-body">
                 <div class="form-group">
                  <label for="namabarang">Nama Barang</label>
                  <input type="hidden" id="id">
                  <input type="text" class="form-control" id="Unamabarang" placeholder="Masukkan Nama Barang">
                </div>
                <div class="form-group">
                  <label for="harga">Harga Jual Barang</label>
                  <input type="number" class="form-control" id="Uharga" placeholder="Harga Barang">
                </div>
                <div class="form-group">
                  <label for="stok">Stok Barang</label>
                  <input type="number" class="form-control" id="Ustok" placeholder="Stok Barang" readonly>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select id="Ukat" name="kategori" class="form-control">
                  <?php foreach($sql as $cat) : ?>
                      <option value="<?= $cat['id_kategori']; ?>"><?= $cat['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" onclick="updateBarang()" class="btn btn-primary">Save changes</button>

      </div>
    </div>
  </div>
</div>