
$('#editkategorimodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var kategori=link.data('kategori');
	var kategori_id=link.data('kategori_id');

	modal.find('.modal-body #kategori').val(kategori);
	modal.find('.modal-body #frmeditcat').prop('action','/updatecategory/'+kategori_id);
});

$('#delkategorimodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var kategori=link.data('kategori');
	var kategori_id=link.data('kategori_id');

	modal.find('.modal-body #kategori').val(kategori);
	modal.find('.modal-body #frmdelcat').prop('action','/delcategory/'+kategori_id);
});
