<!-- Info boxes -->
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-dollar"></i></span>

            <div class="info-box-content">
              <h5>Pendapatan Hari Ini</h5>
              <span class="info-box-number" id="getPriceDay"></span>
            </div>
          </div>
        </div>

        <!-- BOX LastOrder -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <h5>Terjual Hari Ini</h5>
              <span class="info-box-number" id="getOrderBarang"></span>
            </div>
          </div>
        </div>


        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-cube"></i></span>

            <div class="info-box-content">
              <h5>Total Barang</h5>
              <span class="info-box-number" id="CountBarang"></span>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa  fa-calendar"></i></span>

            <div class="info-box-content">
              <h6>Laporan Barang Hari Ini</h6>
              <span class="info-box-number" id="CountLaporan"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>



<div class="row">

<div class="col-md-6">

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-sm">
                  <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>Sub Total</th>
                    <th>Diskon</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody id="LatestOrder">

                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer clearfix">
              <a href="?halaman=Laporan" class="btn btn-xs btn-primary btn-flat pull-right">View All</a>
            </div>
          </div>





          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Barang Masuk Terakhir</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-sm">
                  <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Kode Kategori</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody id="LatestBarang">

                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer clearfix">
              <a href="?halaman=Barang" class="btn btn-xs btn-warning btn-flat pull-right">View All</a>
            </div>
          </div>

<!-- End col-6 -->
    </div> 
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
        <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title">Latest StokIn</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin table-sm">
                    <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody id="StokBarang">

                    </tbody>
                    </table>
                </div>
                </div>
                <div class="box-footer clearfix">
                <a href="?halaman=LaporanStok" class="btn btn-xs btn-success btn-flat pull-right">View All</a>
                </div>
            </div>

            <div class="box box-purple">
                <div class="box-header with-border">
                <h3 class="box-title">Stok Menipis</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin table-sm">
                    <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Kategori</th>
                    </tr>
                    </thead>
                    <tbody id="StokHabis">

                    </tbody>
                    </table>
                </div>
                </div>
            </div>
    </div>

    <div class="col-md-6">
    <div class="box box-danger">
                <div class="box-header with-border">
                <h3 class="box-title">Latest StokOut</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin table-sm">
                    <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody id="StokOutBarang">

                    </tbody>
                    </table>
                </div>
                </div>
                <div class="box-footer clearfix">
                <a href="?halaman=LaporanStok" class="btn btn-xs btn-danger btn-flat pull-right">View All</a>
                </div>
            </div>
    </div>

</div>
    </div>
</div>