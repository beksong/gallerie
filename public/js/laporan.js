$('#detilpenjualanmodal').on('show.bs.modal',function(e){
	var link=$(e.relatedTarget);
	var modal=$(this);
	/*modal.find('#tbrpthrinimodal').DataTable();*/
	modal.find('#no_nota').text(link.data('no_nota'));
	modal.find('#tgl_jual').text(link.data('tgl_jual'));
	modal.find('#kasir').text(link.data('kasir'));

	$.ajax({
		url : '../../rpt/'+link.data('penjualan_id'),
		type : 'get',
		dataType : 'json',
		success : function(data){
			/*console.log(data);*/
			modal.find('#tbrpthrinimodal tbody').empty();
			$.each(data,function(i,v){

				modal.find('#tbrpthrinimodal').append(
					'<tr>'+
						'<td>'+(i+1)+'</td>'+
						'<td>'+v.barang.barang+'</td>'+
						'<td>'+v.qty+'</td>'+
						'<td>Rp. '+convertrupiah(v.hrg_beli)+'</td>'+
						'<td>Rp. '+convertrupiah(v.ongkir_pembelian)+'</td>'+
						'<td>Rp. '+convertrupiah(v.hrg_jual)+'</td>'+
						'<td>'+convertrupiah(v.discount)+' %</td>'+
						'<td>Rp. '+convertrupiah(v.nom_discount)+'</td>'+
						'<td>Rp. '+convertrupiah(v.hrg_jual_discount)+'</td>'+
						'<td>Rp. '+convertrupiah(v.potongan_item)+'</td>'+
						'<td>Rp. '+convertrupiah(v.hrg_jual_net)+'</td>'+
						'<td>Rp. '+(v.hrg_jual_net-(v.hrg_beli*v.qty)-v.ongkir_pembelian)+'</td>'+
					'</tr>'
				);
			});
		}
	});
});

