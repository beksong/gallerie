$('#tbpermissionmodal').DataTable({

});

$('#updatepermissionmodal').on('show.bs.modal',function(e){
	modal=$(this);
	link=$(e.relatedTarget);

	modal.find('#frmupdatepermission').prop('action','updatepermission/'+link.data('id'));
	modal.find('.modal-body #permission_name').val(link.data('name'));
	modal.find('.modal-body #description').val(link.data('description'));
});

$('#attachrolemodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	modal.find('.modal-body #user_name').val(link.data('user_name'));
	modal.find('.modal-body #user_id').val(link.data('user_id'));
	modal.find('.modal-body #role_id').val(link.data('role_id'));
	modal.find('.modal-body #role_name').val(link.data('role_name'));
	$.ajax({
		url : 'role',
		type: 'get',
		dataType:'json',
		success : function(data){
			$('#role_id').empty();
            $('#role_id').append('<option value="">--Pilih Hak Akses--</option>');
			$.each(data,function(i,v){
				modal.find('.modal-body #role_id').append($('<option>',{
                    value : v.id,
                    text : v.display_name
                }));
			});
		}
	});

	$('.modal-body #role_id').on('change',function(e){
		$.ajax({
			url : 'permissionuser/'+e.target.value,
			type: 'get',
			dataType : 'json',
			success : function(data){
				$.each(data,function(i,v){
					$('#tbpermissionmodal tr').each(function(){
						if ($(this).find("*[data-field='permission_id']").val()==v.id) {
							$(this).find("*[data-field='permission_id']").prop('checked',true);
						}
					});
				});
			}
		});
	});
});

$('#all').click(function(){
	if(this.checked){
		$('#tbpermissionmodal tr').each(function(){
			$(this).find("*[data-field='permission_id']").prop('checked',true);
		});
	}else{
		$('#tbpermissionmodal tr').each(function(){
			$(this).find("*[data-field='permission_id']").prop('checked',false);
		});
	}
});

$('#updaterolemodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);

	modal.find('.modal-body #role_name').val(link.data('role_name'));
	modal.find('.modal-body #frmupdaterole').prop('action','updaterole/'+link.data('role_id'));
	modal.find('.modal-body #description').val(link.data('description'));
});

$('#deleterolemodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);

	modal.find('.modal-body #role_name').val(link.data('role_name'));
	modal.find('.modal-body #frmdeleterole').prop('action','deleterole/'+link.data('role_id'));
	modal.find('.modal-body #description').val(link.data('description'));
});

