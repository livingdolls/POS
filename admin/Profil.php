<div class="alert alert-success" role="alert" id="pesan">
        
        </div>
<div class="row">
    <div class="col-md-4">
    <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
              <div class="widget-user-image">
                <img class="img-circle" src="admin/img/<?= $datauser['foto']; ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?= $datauser['nama_admin']; ?></h3>
              <h5 class="widget-user-desc">
                  <?php
                    if($datauser['level'] == 'admin')
                    {
                        echo 'Kasir';
                    }
                    else
                    {
                        echo 'Super Admin';
                    }
                  ?>
              </h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"><?= $datauser['email_admin']; ?> <span class="pull-right badge bg-blue"><i class="fa  fa-envelope"></i></span></a></li>
                <li><a href="#">Bergabung sejak <?= $datauser['create_at']; ?> <span class="pull-right badge bg-aqua"><i class="fa fa-calendar"></i></span></a></li>
                <li><a href="#">Terakhir Update Profil <?= $datauser['update_at']; ?> </a></li>
              </ul>
            </div>
          </div>

    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Identitas</h3>
            </div>
            <div class="box-body">
            <form class="form-horizontal" id="updateAdmin" method="POST">
              <div class="box-body">

              <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                     <input type="hidden" name="id_admin" id="idAdmin">
                    <input type="text" class="form-control" name="nama" id="Anama" value="<?= $datauser['nama_admin']; ?>" placeholder="Nama Admin">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" id="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="Aemail" value="<?= $datauser['email_admin'] ?>" placeholder="Email">
                    <input type="hidden" name="level" value="<?= $datauser['level'] ?>">
                    <input type="hidden" name="id_admin" value="<?= $datauser['id_admin'] ?>">

                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="Apassword" value="<?= $datauser['password'] ?>" placeholder="Password">
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
           

              <button type="button" class="btn btn-xs btn-block btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-xs btn-block btn-primary">Save changes</button>
            </form>
            </div>
        </div>
    </div>
</div>