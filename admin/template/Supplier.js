var tablesupplier;

$(document).ready(function(){
    tablesupplier = $('#table-supplier').DataTable({
        'processing' : true,
        'ajax'  : 'supplier/getSupplier.php',
        'order' : []
    });
});

$(document).ready(function (e) {
	$("#form-supplier").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "supplier/addSupplier.php",
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

                tablesupplier.ajax.reload(null, false);

                $('#nama').val('');
                $('#email').val('');
                $('#hp').val('');
                $('#alamat').val('');
		    } 	        
	   });
	}));
});

function getDetailSupplier(id)
{
    $.ajax({
        type:"POST",
        data:'id='+id,
        url:'supplier/getDetailSupplier.php',
        success: function(result){
            var obj = JSON.parse(result);

            $('#namaSupplier').val(obj.supplier);
            $('#emailSupplier').val(obj.email);
            $('#hpSupplier').val(obj.hp);
            $("#alamatSupplier").val(obj.alamat);
            $('#idSupplier').val(obj.id_supplier);
		}
    })
}

$(document).ready(function (e) {
	$("#update-supplier").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "supplier/updateSupplier.php",
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

                tablesupplier.ajax.reload(null, false);

				$('#idSupplier').val('');
				$('#namaSupplier').val('');
                $('#emailSupplier').val('');
				$('#hpSupplier').val('');
				$('#alamatSupplier').val('');
				
		    } 	        
	   });
	}));
});

function deleteSupplier(id)
{
    $.ajax({
        type:"POST",
        data:'id='+id,
        url:'supplier/deleteSupplier.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#pesan').show();
            $('#pesan').html(obj.pesan);

            tablesupplier.ajax.reload(null, false);
        }
    });
}

