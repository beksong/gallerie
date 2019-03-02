$('#hapuspembelianmodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	modal.find('#frmdelpembelian').prop('action','gudang/delpembelian/'+link.data('pembelian_id'));
	modal.find('#no_faktur').val(link.data('no_faktur'));
	modal.find('#tgl_faktur').val(link.data('tgl_faktur'));
	modal.find('#suplier').val(link.data('suplier'));
	modal.find('#jth_tempo').val(link.data('jth_tempo'));
});

$('#detilpembelianmodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);
	var pid=link.data('pid');
	modal.find('#no_faktur').text(": "+link.data('no_faktur'));
	modal.find('#no_sjpembelian').text(": "+link.data('no_sjpembelian'));
	modal.find('#tgl_pengiriman').text(": "+link.data('tgl_pengiriman'));
	modal.find('#tgl_terima').text(": "+link.data('tgl_terima'));
	modal.find('#suplier').text(": "+link.data('suplier'));
	modal.find('#tgl_faktur').text(": "+link.data('tgl_faktur'));
	modal.find('#jenis').text(": "+link.data('jenis'));
	modal.find('#jth_tempo').text(": "+link.data('jth_tempo'));

	$.ajax({
		url : '../detilsjpembelian/'+pid,
		type : 'get',
		dataType : 'json',
		success : function(data){
			console.log(data);
			modal.find('#tbpembelianmodal tbody').empty();
			$.each(data,function(i,v){
				modal.find('#tbpembelianmodal').append(
					'<tr>'+
						'<td>'+(i+1)+'</td>'+
						'<td>'+v.barang.kd_barang+'</td>'+
						'<td>'+v.barang.barang+'</td>'+
						'<td>'+v.qty+'</td>'+
						'<td>'+v.hrgsatuan+'</td>'+
						'<td>'+v.ongkir_pembelian+'</td>'+
						'<td>'+((v.hrgsatuan*v.qty)+(v.ongkir_pembelian*v.qty))+'</td>'+
					'</tr>'
				);
			});
		}
	});
});