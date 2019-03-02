$(document).ready(function(){
	$('#tgl_awal').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat : "yy-mm-dd"
	});
	$('#tgl_awal').val('');
	$('#tgl_akhir').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat : "yy-mm-dd"
	});
	$('#tgl_akhir').val('');
});
