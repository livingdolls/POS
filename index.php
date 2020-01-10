<?php
  include 'konek.php';
  include 'Auth.php';

  $sum = 0;
  if(isset($_SESSION['kasir'])){
      foreach($_SESSION['kasir'] as $key => $value){
        $jmldiskon = $value['diskon'] * $value['harga'] / 100;
        $diskon = $jmldiskon * $value['jumlah'];
        $sum += ($value['harga']*$value['jumlah']) - $diskon;
      }
  }
  $barang = $konek->query("SELECT * FROM barang");

  $iduser =  $_SESSION['user'];
  $sqluser = $konek->query("SELECT * FROM `admin` WHERE id_admin = '$iduser'");
  $datauser = $sqluser->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
    <link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="admin/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="admin/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="admin/assets/bower_components/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="admin/assets/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" type="text/css" href="admin/assets/daterangepicker.css" />
    <link rel="stylesheet" href="admin/assets/DataTables/DataTables/css/dataTables.bootstrap.min.css">
    <script src="admin/assets/jq.js"></script>
    <script src="admin/assets/dt.js"></script>
  <style>  
      ul.list-unstyled{  
          background-color:#eee;  
          cursor:pointer;  
      }  
      li.barang{  
          padding:12px;
      }
      li.notfound{
        padding: 12px;
      }  
    </style>  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="admin/assets/index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
           
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="admin/admin/img/<?= $datauser['foto'] ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $datauser['nama_admin']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="admin/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                  <?= $datauser['nama_admin']; ?>
                    <small><?= $datauser['create_at']; ?></small>
                  </p>
                </li>
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="admin/" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="content-wrapper">
    <!-- <div class="container"> -->
      <section class="content-header">
        <h1>
          Kasir Menu
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
     


      <div class="row">
            <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Main Menu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
            <button type="button" class="btn btn-info btn-xs btn-block" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-list"></i> List Barang
              </button>
              <div class="col-md-3"></div>
              </div>
            </div>
            <form method="POST" action="proses.php" role="form" id="form-admin">
              <div class="box-body">

              <div class="input-group margin">
                <input type="text" id="namabarang" name="namabarang" class="form-control" placeholder="Cari Cepat" autocomplete="off">
                    <span class="input-group-btn">
                      <button type="button" onclick="autofill()" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                    </span>
              </div>
              <div id="barang"></div>

              <div class="form-group hiding">
                <label for="harga">Harga Barang</label>
                <input type="hidden" readonly name="id" id="idBarang">
                <input type="text" class="form-control" name="harga" id="harga" readonly placeholder="Harga Barang" >
              </div>
              <div class="form-group hiding">
                <label for="stk">Stok Tersisa</label>
                <input type="number" class="form-control" name="stt" id="stok" readonly placeholder="1" min="1">
              </div>
              <div class="form-group hiding">
                <label for="exampleInputPassword1">Jumlah Barang</label>
                <input type="number" class="form-control" name="qty" id="qty" required value="1" placeholder="1" min="1">
              </div>
              <div class="form-group hiding">
                <label for="diskon">Diskon </label><small> (Kosongkan jika tidak ada)</small>
                <input type="number" class="form-control" name="diskon" id="diskon">
              </div>
              <button class="btn btn-block btn-sm btn-primary hiding">Add To Cart <i class="fa fa-shopping-cart"></i></button>
              </div>
            </form>
          </div>

        </div>



            <div class="col-sm-8">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover form-user">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th width="10px" scope="col">Jumlah Barang</th>
                        <th width="10px" scope="col">Diskon (%)</th>
                        <th scope="col">Total</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($_SESSION['kasir'])) : ?>
                      <?php $no = 1; foreach($_SESSION['kasir'] as $data) : ?>
                      <?php
                        $jmldiskon = $data['diskon'] * $data['harga'] / 100;
                        $harga = $jmldiskon * $data['jumlah'];
                      ?>
                        <tr>
                          <th scope="row"><?= $no++; ?></th>
                          <td><?= $data['namabarang']; ?></td>
                          <td>Rp <?= number_format($data['harga']); ?></td>
                          <form action="UpChart.php" method="POST">
                            <input type="hidden" name="Uid" value="<?= $data['id']; ?>">
                          <td><input type="number" name="Uqty" max="<?= $data['stok']; ?>" value="<?= $data['jumlah']; ?>"></td>
                          <td><input type="number" name="Udis" max="100" value="<?= $data['diskon']; ?>">% <small><i> (Rp <?= number_format($harga); ?>)</i></small> </td>
                          <td>Rp <?= number_format(($data['harga']*$data['jumlah']) - $harga); ?></td>
                          <td><button class="btn btn-xs btn-primary"><i class="fa fa-save"></i></button> | <a class="btn btn-xs btn-danger" href="UpChart.php?idx=<?= $data['id']; ?>"><i class="fa fa-trash"></i></a></td>
                          </form>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                    <tfooter>
                        <td>Total Bayar</td>
                        <td>Rp <?= number_format($sum); ?></td>
                    </tfooter>
                  </table>

                  <?php
                      $dt = date('Y-m-d');
                      $query = $konek->query("SELECT MAX(invoice) as kodex  FROM  orders_detail WHERE create_at LIKE '%$dt%' ");
                      $data = $query->fetch_assoc();
                      $kode = $data['kodex']; 
                      $nourut = substr($kode, 8, 4);
                      $nourut++; 
                      $tgl = date('Ymd');
                      $inv =  $tgl.sprintf("%04s", $nourut)
                    ?>
                  <br>
                  <a href="reset.php" class="btn btn-danger btn-sm">Kosongkan Keranjang</a>
                  <button onclick="checkout()" class="btn btn-primary btn-sm">Chekout <i class="fa fa-shopping-cart"></i></button>
                  
            </div>
            </div>





            </div> <!--end col-8 -->
        </div> <!--end row-->

       
        <div class="main-content inv">
        <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Invoice</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
      <div class="box-body">
        <div class="row">
        
          <div class="container">
          <div class="col-md-6">
          <form action="checkout.php" method="POST">
                  <div class="form-group">
                    <label for="invoice">Invoice</label>
                    <input type="text" class="form-control" name="invoice" readonly value="<?= $inv ?>">
                  </div>
                  <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" name="subtotal" id="total" readonly value="<?= $sum ?>">
                  </div>
                  <div class="form-group">
                    <label for="total">Diskon</label><small> (Biarkan 0 jika tidak ada)</small>
                    <input type="number" min="0" max="100" name="diskon" id="diskon"  class="form-control" required value="0">
                  </div>
                  <div class="form-group">
                    <label for="total">Total Bayar</label>
                    <input type="text" class="form-control" name="totalbayar" id="totalbayar" readonly value="<?= $sum ?>">
                  </div>
                  <button class="btn btn-primary btn-sm">Chekout <i class="fa fa-shopping-cart"></i></button>
            </form>
          </div>
              <div class="col-md-6">
              <!-- <form action="checkout.php" method="POST"> -->
                          <div class="form-group">
                            <label for="invoice">Bayar</label>
                            <input type="number" id="bayaruang" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="invoice">Kembali</label>
                            <input type="number" id="kembaliuang" readonly class="form-control">
                          </div>
                      <!-- </form> -->
          </div>
          </div>
        </div>
      </div>
        </div>
        </div> <!--Main Content-->
  </div>
  </div>
      </section>
    </div>
  </div>
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>


<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">List Barang</h4>
              </div>
              <div class="modal-body">
                    <table class="table table-bordered table-striped" id="CariBarang">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Stok</th>
                          <th>Harga</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach($barang as $res) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $res['nama_barang'] ?></td>
                          <td><?= $res['stok']; ?></td>
                          <td><?= $res['harga_barang']; ?></td>
                          <td>
                          <?php if($res['stok'] > 0) : ?>  
                          <button id="select" class="btn btn-xs btn-info"
                          data-id="<?= $res['id_barang']; ?>"
                          data-nama = "<?= $res['nama_barang'] ?>"
                          data-stok = "<?= $res['stok']; ?>"
                          data-harga = "<?= $res['harga_barang'] ?>"
                          ><i class="fa fa-check"></i></button></td>
                          <?php else : ?>
                          <button class="btn btn-danger btn-xs" disabled>Habis</button>

    <?php endif; ?>
                        </tr>
    <?php endforeach; ?>
                      </tbody>
                    </table>

              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script>
  $(document).ready(function(){
    $('#CariBarang').DataTable();

    $(document).on('click','#select',function(){
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      var stok = $(this).data('stok');
      var harga = $(this).data('harga');

        $.ajax({
          method: 'POST',
          url : 'tes.php',
          data : 'id='+id+'&namabarang='+nama+'&qty=1&harga='+harga+'&diskon=0',
          success: function(result){

          }
        })

    })
  });

</script>
<script src="admin/assets/DataTables/DataTables/js/dataTables.bootstrap.min.js"></script> <!--DataTables Theme-->
<script src="admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="admin/assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="admin/assets/dist/js/adminlte.min.js"></script>
<script src="admin/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="admin/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="admin/assets/bower_components/chart.js/Chart.js"></script>


<script src="admin/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="admin/assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="admin/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="admin/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="admin/assets/bower_components/moment/min/moment.min.js"></script>
<script src="admin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="admin/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="admin/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="admin/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="admin/assets/plugins/iCheck/icheck.min.js"></script>
<script src="admin/assets/dist/js/demo.js"></script>
<script type="text/javascript" src="admin/assets/daterangepicker.js"></script>
<script type="text/javascript" src="admin/assets/moment.min.js"></script>

<script src="main.js"></script>
</body>
</html>
