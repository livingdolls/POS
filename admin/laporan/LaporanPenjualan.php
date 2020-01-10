<div class="row">
    <div class="col-md-4">
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
    </div>
    <div class="col-md-3">
        <button type="button" id="saveBtn" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="fa fa-search"></i></button>
    </div>

    <div class="col-md-4">
        <h4 id="pesan" class="pull-right"> </h4>
    </div>
</div>
<br>
<table id="table-filter-main" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Admin</th>
                    <th>Invoice</th>
                    <th>Sub Total</th>
                    <th>Diskon (%)</th>
                    <th>Total</th>
                    <th>Waktu</th>
                </tr>
                </thead>
                <tbody id="table-filter">

                </tbody>
</table>


<script type="text/javascript">
$(document).ready(function() {
    var startDate;
    var endDate;
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
            startDate = start;
            endDate = end;   
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

    $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));

    $('#saveBtn').click(function(){

        var st = startDate.format('YYYY-MM-DD');
        var en = endDate.format('YYYY-MM-DD');
        onloading();
        function onloading(){
        var FBHandler = $('#table-filter'); 
        FBHandler.html('');
        $.ajax({
            method:'GET',
            url:'laporan/filterDate.php',
            data:'start='+st+'&end='+en,
            success:function(result){
                var obj = JSON.parse(result);
                var no =1;
                $.each(obj,function(key,val){
                
                var b = $("<tr>");
                b.html('<td>'+no+'</td><td>'+val.admin+'</td><td><span class="label label-primary">'+val.invoice+'</span></td><td>'+val.sub_total+'</td><td>'+val.diskon+'</td><td>'+val.total+'</td><td>'+val.create_at+'</td>');
                FBHandler.append(b);
                
                no++;
            })
            $('#table-filter-main').DataTable();
            }
        });

        $.ajax({
            method:'GET',
            url:'laporan/tes.php',
            data:'start='+st+'&end='+en,
            success:function(result){
                var obj = JSON.parse(result);
                    $('#pesan').show();
                    $('#pesan').html('<span class="label label-success">Total Rp '+obj.uang+'</span>');

            }
        });


        }

        
    });

});



</script>

