var tableAdmin;

$(document).ready(function(){
    tableAdmin = $('#table-admin').DataTable({
        'processing' : true,
        'ajax' : 'admin/getData.php',
        'order' : []
    })
});

$(document).ready(function (e) {
	$("#form-admin").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "admin/addAdmin.php",
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

                tableAdmin.ajax.reload(null, false);

                var $el = $('#foto');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.unwrap();

                $('#nama').val('');
                $('#email').val('');
                $('#password').val('');
		    } 	        
	   });
	}));
});

function deleteAdmin(id)
{
    $.ajax({
        type:"POST",
        data:'id='+id,
        url:'admin/deleteAdmin.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#pesan').show();
            $('#pesan').html(obj.pesan);

            tableAdmin.ajax.reload(null, false);
        }
    });
}

function getDetail(id)
{
    $.ajax({
        type:"POST",
        data:'id='+id,
        url:'admin/getDetail.php',
        success: function(result){
            var obj = JSON.parse(result);
            $('#vfoto').html('<img class="profile-user-img img-responsive img-circle" src="admin/img/'+obj.foto+'" alt="User profile picture">');

            $('#Anama').val(obj.nama_admin);
            $('#Aemail').val(obj.email_admin);
            $('#Apassword').val(obj.password);
            $("#level").val(obj.level);
            $('#idAdmin').val(obj.id_admin);           
        }
    })
}

$(document).ready(function (e) {
	$("#updateAdmin").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "admin/updateAdmin.php",
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
                var $el = $('#foto');
            $el.wrap('<form>').closest('form').get(0).reset();
            $el.unwrap();

            tableAdmin.ajax.reload(null, false);

                var $el = $('#foto');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.unwrap();

                $('#nama').val('');
                $('#email').val('');
                $('#password').val('');

		    } 	        
	   });
	}));
});