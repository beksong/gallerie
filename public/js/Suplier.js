$('#editsupliermodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var suplier_id=link.data('suplier_id');
	var suplier_nama=link.data('suplier_nama');
	var suplier_alamat=link.data('suplier_alamat');
	var suplier_telp=link.data('suplier_telp');
	var suplier_email=link.data('suplier_email');

	modal.find('.modal-body #nama').val(suplier_nama);
	modal.find('.modal-body #alamat').val(suplier_alamat);
	modal.find('.modal-body #telp').val(suplier_telp);
	modal.find('.modal-body #email').val(suplier_email);
	modal.find('.modal-body #frmeditsup').prop('action','/updatesuplier/'+suplier_id);
});

$('#delsupliermodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var suplier_id=link.data('suplier_id');
	var suplier_nama=link.data('suplier_nama');
	var suplier_alamat=link.data('suplier_alamat');
	var suplier_telp=link.data('suplier_telp');
	var suplier_email=link.data('suplier_email');

	modal.find('.modal-body #nama').val(suplier_nama);
	modal.find('.modal-body #alamat').val(suplier_alamat);
	modal.find('.modal-body #telp').val(suplier_telp);
	modal.find('.modal-body #email').val(suplier_email);
	modal.find('.modal-body #frmdelsup').prop('action','/delsuplier/'+suplier_id);
});