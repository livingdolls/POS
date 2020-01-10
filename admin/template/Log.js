var tableLog;

$(document).ready(function(){
    tableLog = $('#tabel-log').DataTable({
        'processing' : true,
        'ajax' : 'log/getData.php',
        'order' : []
    })
});