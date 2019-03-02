$('#detilpenjualankasirtoday').on('show.bs.modal',function(e){
	var link=$(e.relatedTarget);
	var mdl=$(this);

	mdl.find('.modal-body #no_nota').text(link.data('no_nota'));
	mdl.find('.modal-body #tgl_jual').text(link.data('tgl_jual'));
	mdl.find('.modal-body #kasir').text(link.data('kasir'));
	var total=0;
	$.ajax({
		url : "rpt/"+link.data('jualid'),
		type: "get",
		dataType: "json",
		success : function(data){
			mdl.find('#tbpenjualankasirtoday tbody').empty();
			$.each(data,function(i,v){

				mdl.find('#tbpenjualankasirtoday').append(
					'<tr>'+
						'<td>'+(i+1)+'</td>'+
						'<td>'+v.barang.barang+'</td>'+
						'<td>'+v.qty+'</td>'+
						'<td>Rp. '+convertrupiah(v.hrg_jual)+'</td>'+
						'<td>'+convertrupiah(v.discount)+' %</td>'+
						'<td>Rp. '+convertrupiah(v.nom_discount)+'</td>'+
						'<td>Rp. '+convertrupiah(v.hrg_jual_discount)+'</td>'+
						'<td>Rp. '+convertrupiah(v.potongan_item)+'</td>'+
						'<td align="right">Rp. '+convertrupiah(v.hrg_jual_net)+'</td>'+
					'</tr>'
				);
				total+=v.hrg_jual_net;
			});
			mdl.find('#total').text('Rp. '+convertrupiah(total));
			mdl.find('#terbilang').text('Terbilang : '+terbilang(total)+' Rupiah');
		}
	});
});