/*$(function(){
	$('#frmaddcat').on('submit',function(e){
		$.ajaxSetup({
			header:$('meta[name="_token"]').attr('content')
		});
		
		$.ajax({
			type: "post",
			url: '/createcategory',
			data: $(this).serialize(),
			dataType : 'json',
			success	: function(data){
				
				location.reload();
				$(".modal-body #kategori").val("");
				$('#sukses').show().setTimeOut(5000);
			},
			error	: function(data){

			}
		});
	});
});
*/
$('#editbrandmodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var brand=link.data('brand');
	var brand_id=link.data('brand_id');

	modal.find('.modal-body #brand').val(brand);
	modal.find('.modal-body #frmeditbrand').prop('action','/updatebrand/'+brand_id);
});

$('#delbrandmodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var brand=link.data('brand');
	var brand_id=link.data('brand_id');

	modal.find('.modal-body #brand').val(brand);
	modal.find('.modal-body #frmdelbrand').prop('action','/delbrand/'+brand_id);
});

/*$(function(){
	$('#frmeditcat').on('submit',function(e){
		e.preventDefault();
		$.ajaxSetup({
			header:$('meta[name="_token"]').attr('content')
		});
		
		$.ajax({
			type: "post",
			url: $('.modal-body #frmaeditcat').attr('action'),
			data: $(this).serialize(),
			dataType : 'json',
			success	: function(data){
				
				location.reload();
				$(".modal-body #kategori").val("");
				$(".modal-body #kategori_id").val("");
				$('#update').show().setTimeOut(5000);
			},
			error	: function(data){

			}
		});
	});
});*/