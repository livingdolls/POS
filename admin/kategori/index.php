<div class="alert alert-success" role="alert" id="pesan">        
</div>
<div class="row">
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" role="form" id="form-kategori">
              <div class="box-body">
              <div class="form-group">
                  <label for="Nama">Nama</label>
                  <input type="text" name="namakategori" id="namakategori" class="form-control" id="nama" placeholder="Masukkan Nama">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

        <div class="col-md-8">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-kategori" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Kategori</th>
                          <th>Kode</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody id="KBarisBaru">

                  </tbody>
              </table>
            </div>
        </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLong">Form Edit Kategori</h3>
      </div>
      <div class="modal-body">
                 <div class="form-group">
                  <label for="namabarang">Nama Kategori</label>
                  <input type="hidden" id="id">
                  <input type="text" class="form-control" id="Unamakategori" placeholder="Masukkan Nama Kategori">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" onclick="updateCat()" class="btn btn-primary">Save changes</button>

      </div>
    </div>
  </div>
</div>