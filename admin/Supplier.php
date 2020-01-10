<div class="alert alert-success" role="alert" id="pesan">        
</div>
<div class="row">

        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Supplier</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" role="form" id="form-supplier">
              <div class="box-body">
              <div class="form-group">
                  <label for="Nama">Nama</label>
                  <input type="text" name="supplier" class="form-control" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="hp">Telepon</label>
                <div class="input-group">
                    <span class="input-group-addon">+62</span>
                    <input type="text" class="form-control" name="hp" id="hp" placeholder="Telepon">
                </div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
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
              <h3 class="box-title">Daftar Supplier</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-supplier" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Supplier</th>
                          <th>Email</th>
                          <th>Telepon</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody id="ViewSupplier">

                  </tbody>
              </table>
            </div>
        </div>
</div>
<!-- Button trigger modal -->

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLong">Form Edit Supplier</h3>
      </div>
      <div class="modal-body">
      <form method="POST" role="form" id="update-supplier">
              <div class="box-body">
              <div class="form-group">
                  <label for="Nama">Nama</label>
                  <input type="hidden" name="idSupplier" id="idSupplier">
                  <input type="text" name="supplier" class="form-control" id="namaSupplier" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" class="form-control" name="email" id="emailSupplier" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="hp">Telepon</label>
                <div class="input-group">
                    <span class="input-group-addon">+62</span>
                    <input type="text" class="form-control" name="hp" id="hpSupplier" placeholder="Telepon">
                </div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamatSupplier" class="form-control"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>