$('#tbpermissionmodal').DataTable({

});

$('#updateroleusermodal').on('show.bs.modal',function(e){
	modal=$(this);
	link=$(e.relatedTarget);

	modal.find('#frmupdateroleusermodal').prop('action','attachroleuser/'+link.data('user-id'));
	modal.find('.modal-body #username').val(link.data('username'));
});
