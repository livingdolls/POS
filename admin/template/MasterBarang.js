var tabelmaster;
$(document).ready(function(){
    tabelmaster = $('#tabel-master').DataTable({
        'processing' : true,
        'ajax' : 'master/MgetData.php',
        'order' : []
    });
});

function MgetStock(id){
    $('#Mid').val(id);
}


function MupdateStock(){
    var stok = $('#Mstok').val();
    var keterangan = $('#Mketerangan').val();
    var id = $('#Mid').val();
    var sup = $('#UMsupplier').val();

    $.ajax({
        type:'POST',
        data:'keterangan='+keterangan+'&stok='+stok+'&id='+id+'&supplier='+sup,
        url:'master/MUstok.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#pesan').show();
            $('#pesan').html(obj.pesan);
            $('#exampleModalLong').modal('hide');

            tabelmaster.ajax.reload(null,false);

            stok        = $('#Mstok').val('');
            keterangan  = $('#Mketerangan').val('');
            id          = $('#Mid').val('');
        }
    });
}