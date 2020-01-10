<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Semua Penjualan</a></li>
              <li><a href="#tab_2" data-toggle="tab">Hari Ini</a></li>
              <li><a href="#tab_3" data-toggle="tab">Filter Waktu</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <table id="table-laporan" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Admin</th>
                    <th>Invoice</th>
                    <th>Sub Total</th>
                    <th>Diskon (%)</th>
                    <th>Total</th>
                    <th>Waktu</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody id="LBarisBaru">

                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              <table id="LHari" width="100%" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Admin</th>
                    <th>Invoice</th>
                    <th>Sub Total</th>
                    <th>Diskon (%)</th>
                    <th>Total</th>
                    <th>Waktu</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody id="LHariIni">

                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <?php include 'laporan/LaporanPenjualan.php'; ?>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Order</h4>
              </div>
              <div class="modal-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Diskon</th>
                        <th>Sub Total</th>
                    </thead>
                    <tbody id="ModalOrder">
                        
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<script>
var Lhari;
$(document).ready(function(){
    Lhari = $('#LHari').DataTable({
      'processing' : true,
      'ajax' : 'laporan/HarIni.php',
      'order' : []
    });
});

</script>