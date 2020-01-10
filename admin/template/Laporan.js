MainLaporan();

function MainLaporan(){
    var bHandler = $('#LBarisBaru');
    bHandler.html('');
    $.ajax({
        method:'GET',
        data : '',
        url : 'laporan/getData.php',
        success: function(result){
            var obj = JSON.parse(result);
            var no =1;
            $.each(obj,function(key,val){
                var b = $("<tr>");
                b.html('<td>'+no+'</td><td>'+val.admin+'</td><td><span class="label label-primary">'+val.invoice+'</span></td><td>Rp '+val.sub_total+'</td><td>'+val.diskon+'</td><td>Rp '+val.total+'</td><td>'+val.create_at+'</td><td><button class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#modal-default" onclick="detailOrder('+val.id_orders_detail+')">Detail</button></td>');
    
                bHandler.append(b);
                no++;
            })
        }
    });
}

function detailOrder(id)
{
    var bHandler = $('#ModalOrder');
    bHandler.html('');
    $.ajax({
        method:"GET",
        data:'id='+id,
        url:'laporan/getOrder.php',
        success:function(result){
            var obj = JSON.parse(result);
            var no =1;
            $.each(obj,function(key,val){
                var b = $("<tr>");
                b.html('<td>'+no+'</td><td>'+val.barang+'</td><td>'+val.jumlah+'</td><td>'+val.diskon+'</td><td>'+val.sub_total+'</td>');
    
                bHandler.append(b);
                no++;
            })
        }
    })
}

$(document).ready(function(){
    $('#table-laporan').DataTable();
});

