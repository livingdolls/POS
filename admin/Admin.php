<?php 
  if($datauser['level'] != 'superadmin')
  {
        echo "<script>location='index.php';</script>";
  }
?>
<div class="alert alert-success" role="alert" id="pesan">        
</div>
<div class="row">
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Admin</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" role="form" id="form-admin">
              <div class="box-body">
              <div class="form-group">
                  <label for="Nama">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="lakses">Akses Level</label>
                    <select class="form-control" name="akseslevel" id="akses">
                        <option value="admin">Admin</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="foto">File input</label>
                  <input type="file" name="foto" id="foto">

                  <p class="help-block">Max 2MB | Allowed type jpg,png,jpeg</p>
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
              <h3 class="box-title">Daftar Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-admin" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama </th>
                          <th>Email</th>
                          <th>Foto</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody id="ABarisBaru">

                  </tbody>
              </table>
            </div>
        </div>
</div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="box box-primary">
            <div class="box-body box-profile">
              <div id="vfoto">
                  
              </div>

              <form class="form-horizontal" id="updateAdmin" method="POST">
              <div class="box-body">

              <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                     <input type="hidden" name="id_admin" id="idAdmin">
                    <input type="text" class="form-control" name="nama" id="Anama" placeholder="Nama Admin">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" id="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="Aemail" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="Apassword" placeholder="Password">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Level Akses</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="level" id="level">
                        <option value="admin">Admin</option>
                        <option value="superadmin">Superadmin</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="foto">File input</label>
                  <div class="col-sm-10">
                    <input    type="file" name="foto" id="foto">
                  </div>
                  <p class="help-block">Max 2MB | Allowed type jpg,png,jpeg</p>
                </div>
              </div>
              <!-- /.box-footer -->
           

            <button type="submit" class="btn btn-xs btn-block btn-primary">Save changes</button>
            <button type="button" class="btn btn-xs btn-block btn-danger" data-dismiss="modal">Close</button>
            </form>
            </div>
      </div>
    </div>
  </div>
</div>