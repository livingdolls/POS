var tablebarang;

$(document).ready(function(){
    tablebarang = $('#table-barang').DataTable({
        'processing' : true,
        'ajax' : 'getData.php',
        'order' : []
    })
});


$('#pesan').hide();
function tambah() {
    var nama = $('#namabarang').val();
    var harga = $('#harga').val();
    var stok = $('#stok').val();
    var kat = $('#kat').val();
    var sup = $('#supplier').val();
    var modal = $('#hargabeli').val();

    $.ajax({
        type:'POST',
        data:'nama='+nama+'&harga='+harga+'&stok='+stok+'&kategori='+kat+'&supplier='+sup+'&modal='+modal,
        url:'addData.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#pesan').show();
            $('#pesan').html(obj.pesan);

            $('#namabarang').val('');
            $('#harga').val('');
            $('#stok').val('');
            $('#kat').val(0);
            $('#hargabeli').val('');
            tablebarang.ajax.reload(null, false);
        }
    });
}

function getUpdate(id)
{
    $.ajax({
        type:'POST',
        data:'id='+id,
        url:'getUpdate.php',
        success: function(result){
            var obj = JSON.parse(result);

            $('#id').val(obj.id_barang);
            $('#Unamabarang').val(obj.nama_barang);
            $('#Uharga').val(obj.harga_barang);
            $('#Ustok').val(obj.stok);
            $('#Ukat').val(obj.id_kategori);
        }
    })
}

function updateBarang()
{
    var nama = $('#Unamabarang').val();
    var harga = $('#Uharga').val();
    var stok = $('#Ustok').val();
    var id = $('#id').val();
    var kat = $('#Ukat').val();

    $.ajax({
        type:'POST',
        data:'id='+id+'&nama='+nama+'&harga='+harga+'&stok='+stok+'&kategori='+kat,
        url:'updateBarang.php',
        success:function(result){
            var obj = JSON.parse(result);
            $('#pesan').show();
            $('#pesan').html(obj.pesan);
            tablebarang.ajax.reload(null, false);
            $('#namabarang').val('');
            $('#harga').val('');
            $('#stok').val('');
        }
    })
}

function deleteBarang(id)
{
    var conf = confirm('Yakin hapus ?');
    if(conf)
    {
        $.ajax({
            type:"POST",
            data:'id='+id,
            url:'deleteBarang.php',
            success: function(result){
                var obj = JSON.parse(result);
                $('#pesan').show();
                $('#pesan').html(obj.pesan);

                tablebarang.ajax.reload(null, false);
            }
        })
    }
}
