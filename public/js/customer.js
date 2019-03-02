
$('#editcustomermodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var cust=link.data('cust');
	var id=link.data('id');

	modal.find('.modal-body #cust_id').val(id);
	modal.find('.modal-body #cust').val(cust);
	modal.find('.modal-body #telp').val(link.data('telp'));
	modal.find('.modal-body #alamat').val(link.data('alamat'));
	modal.find('.modal-body #frmeditcustomer').prop('action','updatecustomer/'+id);
});

$('#delcustomermodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var cust=link.data('cust');
	var id=link.data('id');

	modal.find('.modal-body #cust_id').val(id);
	modal.find('.modal-body #cust').val(cust);
	modal.find('.modal-body #telp').val(link.data('telp'));
	modal.find('.modal-body #alamat').val(link.data('alamat'));
	modal.find('.modal-body #frmdelcustomer').prop('action','deletecustomer/'+id);
});
