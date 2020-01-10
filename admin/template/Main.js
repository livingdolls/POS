MainLaporan();

function MainLaporan(){
    var bHandler = $('#LatestOrder');
    bHandler.html('');
    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getOrder.php',
        success: function(result){
            var obj = JSON.parse(result);
            $.each(obj,function(key,val){
                var b = $("<tr>");
                b.html('<td><span class="label label-primary">'+val.invoice+'</span></td><td>Rp '+val.sub_total+'</td><td>'+val.diskon+'</td><td>Rp '+val.total+'</td>');
    
                bHandler.append(b);
            })
        }
    });

    var BarangHandler = $('#LatestBarang');
    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getBarang.php',
        success: function(result){
            var obj = JSON.parse(result);
            var no =1;
            $.each(obj,function(key,val){
                var b = $("<tr>");
                b.html('<td>'+val.nama_barang+'</td><td>'+val.stok+'</td><td>'+val.id_kategori+'</td><td>Rp '+val.harga_barang+'</td>');
    
                BarangHandler.append(b);
                no++;

            })
        }
    });

    var StokOutHandler = $('#StokOutBarang');
    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getStokOut.php',
        success: function(result){
            var obj = JSON.parse(result);
            $.each(obj,function(key,val){
                var b = $("<tr>");
                b.html('<td>'+val.nama_barang+'</td><td>'+val.jumlah+'</td><td><span class="label label-danger">'+val.status+'</span></td>');
    
                StokOutHandler.append(b);
            })
        }
    });

    var StokHandler = $('#StokBarang');
    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getStok.php',
        success: function(result){
            var obj = JSON.parse(result);
            $.each(obj,function(key,val){
                var b = $("<tr>");
                b.html('<td>'+val.nama_barang+'</td><td>'+val.jumlah+'</td><td><span class="label label-success">'+val.status+'</span></td>');
    
                StokHandler.append(b);
            })
        }
    });

    var MenipisHandler = $('#StokHabis');
    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getBarangHabis.php',
        success: function(result){
            var obj = JSON.parse(result);
            $.each(obj,function(key,val){
                var b = $("<tr>");
                b.html('<td>'+val.nama_barang+'</td><td><span class="label label-warning">'+val.stok+'</span></td><td>'+val.id_kategori+'</td>');
    
                MenipisHandler.append(b);

            })
        }
    });

    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getPriceDay.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#getPriceDay').append('<p>Rp '+obj.uang+'</p>');
        }
    });

    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getOrderBarang.php',
        success: function(result){
            $('#getOrderBarang').html(result);
        }
    });

    $.ajax({
        method:'GET',
        data : '',
        url : 'main/getCountBarang.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#CountBarang').append('<p>'+obj.barang+'</p>');
        }
    });

    $.ajax({
        method:'GET',
        data : '',
        url : 'main/LaporanBarang.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#CountLaporan').append('<p>'+obj.stok+'</p>');
        }
    });
}