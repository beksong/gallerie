function hrgjual(){
    var nominal= $('.modal-body #hrg_jual').val();
    var format=convertrupiah(nominal);
    $('.modal-body #hrg_jual').val(format);
}

function hrgbeli(){
	var nominal= $('.modal-body #hrg_beli').val();
    var format=convertrupiah(nominal);
    $('.modal-body #hrg_beli').val(format);
}

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

/*
	js function to get barang only access by admin or owner
 */
$('#editbarangmodal').on('show.bs.modal',function(e) {
	var modal=$(this);
	var link=$(e.relatedTarget);
	var barang_id=link.data('barang_id');
	modal.find('.modal-body #frmeditbarang').prop('action','/updatebarang/'+barang_id);
	modal.find('.modal-body #category_id').prop('selected',true).val(link.data('category_id'));
	modal.find('.modal-body #kd_barang').val(link.data('kd_barang'));
	modal.find('.modal-body #barang').val(link.data('barang'));
	modal.find('.modal-body #merk_id').val(link.data('merk_id')).prop('selected',true);
	modal.find('.modal-body #satuan').val(link.data('satuan'));
	modal.find('.modal-body #hrg_beli').val(convertrupiah(link.data('hrg_beli')));
	modal.find('.modal-body #hrg_jual').val(convertrupiah(link.data('hrg_jual')));
	modal.find('.modal-body #stok').val(link.data('stok'));
	modal.find('.modal-body #stok_min').val(link.data('stok_min'));
	modal.find('.modal-body #discount').val(link.data('discount'));

});

$('#delbarangmodal').on('show.bs.modal',function(e) {
	var modal=$(this);
	var link=$(e.relatedTarget);
	var barang_id=link.data('barang_id');
	modal.find('.modal-body #frmdelbarang').prop('action','/delbarang/'+barang_id);
	modal.find('.modal-body #category_id').prop('selected',true).val(link.data('category_id'));
	modal.find('.modal-body #kd_barang').val(link.data('kd_barang'));
	modal.find('.modal-body #barang').val(link.data('barang'));
	modal.find('.modal-body #merk_id').val(link.data('merk_id')).prop('selected',true);
	modal.find('.modal-body #satuan').val(link.data('satuan'));
	modal.find('.modal-body #hrg_beli').val(convertrupiah(link.data('hrg_beli')));
	modal.find('.modal-body #hrg_jual').val(convertrupiah(link.data('hrg_jual')));
	modal.find('.modal-body #stok').val(link.data('stok'));
	modal.find('.modal-body #stok_min').val(link.data('stok_min'));
	modal.find('.modal-body #discount').val(link.data('discount'));
});

function removedotbeli(){
	var newdata="";
	var data=$('.modal-body #hrg_beli').val();
	if(data!='null'){
		newdata=data.split('.').join('');
		$('.modal-body #hrg_beli').val(newdata);
	}
}

function removedotjual(){
	var newdata="";
	var data=$('.modal-body #hrg_jual').val();
	if(data!='null'){
		newdata=data.split('.').join('');
		$('.modal-body #hrg_jual').val(newdata);
	}
}
