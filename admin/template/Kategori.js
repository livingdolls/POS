var tablekategori;

$(document).ready(function(){
    tablekategori = $('#table-kategori').DataTable({
        'processing' : true,
        'ajax' : 'kategori/getData.php',
        'order' : []
    });
})

$(document).ready(function (e) {
	$("#form-kategori").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "kategori/addCat.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
                var obj = JSON.parse(data);
                $('#pesan').show();
                $('#pesan').html(obj.pesan);

                tablekategori.ajax.reload(null, false);

                $('#namakategori').val('');
		    } 	        
	   });
	}));
});

function deleteCat(id)
{
    $.ajax({
        type:"POST",
        data:'id='+id,
        url:'kategori/deleteCat.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#pesan').show();
            $('#pesan').html(obj.pesan);

            tablekategori.ajax.reload(null, false);
        }
    });
}

function getUpdateCat(id)
{
    $.ajax({
        type:'POST',
        data:'id='+id,
        url:'kategori/getUpdateCat.php',
        success: function(result){
            var obj = JSON.parse(result);

            $('#id').val(obj.id_kategori);
            $('#Unamakategori').val(obj.nama_kategori);
        }
    })
}

function updateCat()
{
    var nama = $('#Unamakategori').val();
    var id = $('#id').val();

    $.ajax({
        type:'POST',
        data:'id='+id+'&nama='+nama,
        url:'kategori/updateCat.php',
        success:function(result){
            var obj = JSON.parse(result);
            $('#pesan').show();
            $('#pesan').html(obj.pesan);

            tablekategori.ajax.reload(null, false);

            $('#namakategori').val('');
        }
    })
}