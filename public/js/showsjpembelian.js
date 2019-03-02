
$('#detilsjpembelianmodal').on('show.bs.modal',function(e){
	var link=$(e.relatedTarget);
	var modal=$(this);
	var pembelian_id=link.data('pembelian_id');


	modal.find('#no_sjpembelian').text(link.data('no_sjpembelian'));
	modal.find('#tgl_pengiriman').text(link.data('tgl_pengiriman'));
	modal.find('#tgl_terima').text(link.data('tgl_terima'));
	modal.find('#suplier').text(link.data('suplier'));
	modal.find('#no_salesorder').text(link.data('no_salesorder'));

	$.ajax({
		url : 'detilsjpembelian/'+pembelian_id,
		type : 'get',
		dataType : 'json',
		success : function(data){
			/*console.log(data);*/
			modal.find('#tbsjpembelianmodal tbody').empty();
			$.each(data,function(i,v){
				/*console.log(data);*/
				modal.find('#tbsjpembelianmodal').append(
					'<tr>'+
						'<td>'+(i+1)+'</td>'+
						'<td>'+v.barang.kd_barang+'</td>'+
						'<td>'+v.barang.barang+'</td>'+
						'<td>'+v.qty+'</td>'+
					'</tr>'
				);
			});
		}
	});

});

$('#tgl_kirim').datepicker({
	changeMonth: true,
	changeYear: true,
	dateFormat : "yy-mm-dd"
});

$('#detilsjpenjualan').on('show.bs.modal',function(e){
 var link=$(e.relatedTarget);
 var modal=$(this);
 var penjualan_id=link.data('penjualan_id');
 var no_sjpenjualan=link.data('no_sjpenjualan');
 var no_nota=link.data('no_nota');

 modal.find('.modal-body #no_sjpenjualan').text(no_sjpenjualan);
 modal.find('.modal-body #no_nota').text(no_nota);
 modal.find('.modal-body #tgl_jual').text(link.data('tgl_jual'));
 modal.find('.modal-body #frmeditsjpenjualan').prop('action','sjpenjualan/'+penjualan_id);
 modal.find('.modal-body #tgl_kirim').val(link.data('tgl_kirim'));
 modal.find('.modal-body #sopir').val(link.data('sopir'));
 $.ajax({
		url : 'rpt/'+penjualan_id,
		type : 'get',
		dataType : 'json',
		success : function(data){
			/*console.log(data);*/
			modal.find('#tbsjpenjualanmodal tbody').empty();
			$.each(data,function(i,v){
				/*console.log(data);*/
				modal.find('#tbsjpenjualanmodal').append(
					'<tr>'+
						'<td>'+(i+1)+'</td>'+
						'<td>'+v.barang.kd_barang+'</td>'+
						'<td>'+v.barang.barang+'</td>'+
						'<td>'+v.qty+'</td>'+
					'</tr>'
				);
			});
		}
	});
});