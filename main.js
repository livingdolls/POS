
 $(document).ready(function(){  
    $('#namabarang').keyup(function(){  
         var query = $(this).val();  
         if(query != '')  
         {  
              $.ajax({  
                   url:"cari.php",  
                   method:"POST",  
                   data:{query:query},  
                   success:function(data)  
                   {  
                        $('#barang').fadeIn();  
                        $('#barang').html(data);  
                   }  
              });  
         }  
    });  
    $(document).on('click', 'li.barang', function(){  
         $('#namabarang').val($(this).text());  
         $('#barang').fadeOut(); 
    });
    
   $(document).on('change','#diskon',function(){
     var diskon = parseInt($(this).val());
     var total = parseInt($('#total').val());

     var total_bayar = total - (diskon/100)*total;

     $('#totalbayar').val(total_bayar);
     
   })
   
   $(document).on('keyup','#diskon',function(){
     var diskon = parseInt($(this).val());
     var total = parseInt($('#total').val());
     var total_bayar = total - (diskon/100)*total;

     $('#totalbayar').val(total_bayar);
   })

   $(document).on('keyup','#bayaruang',function(){
     var bayar = parseInt($(this).val());
     var total = $('#totalbayar').val();

     var kembali = bayar - total;
     $('#kembaliuang').val(kembali);
   })

});  

$(".hiding").hide();

function autofill(){
    var nama = $('#namabarang').val();
    $.ajax({
        url:'get.php',
        data: 'namabarang='+nama,
        success:function(data){
             var barang = data,
             obj = JSON.parse(barang);
             $(".hiding").show();
             $('#namabarang').val(obj.nama);
             $('#harga').val(obj.harga);
             $('#idBarang').val(obj.id);
             $('#stok').val(obj.stok);
             $('#qty').attr("max",obj.stok);
         }
     });
}

$('.inv').hide();

function checkout(){
     $('.inv').show();
}