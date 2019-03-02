$('#detilpenjualankredit').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);

	$.ajax({
		type : 'get',
		url : '../penjualan/'+link.data('id'),
		dataType: 'json',
		success : function(data){
			console.log(data);
			modal.find('.modal-body #no_nota').text(': '+data.no_nota);
			modal.find('.modal-body #tgl_jual').text(': '+data.tgl_jual);
			modal.find('.modal-body #kasir').text(': '+data.user.name);
			modal.find('.modal-body #no_sjpenjualan').text(': '+data.no_sjpenjualan);
			modal.find('.modal-body #cust').text(': '+data.customer.cust+' - '+data.customer.telp+' - '+data.customer.alamat);
			modal.find('.modal-body #transaksi').text(': '+data.transaksi);
			var total=0;
			$.each(data.detilpenjualans,function(i,v){
				modal.find('.modal-body #tbdetilpenjualankredit').append(
					'<tr>'+
						'<td>'+(i+1)+'</td>'+
						'<td>'+v.barang.barang+'</td>'+
						'<td>'+v.qty+'</td>'+
						'<td>'+v.barang.satuan+'</td>'+
						'<td align="right">'+convertrupiah(v.hrg_jual)+'</td>'+
						'<td align="right">'+convertrupiah(v.nom_discount)+'</td>'+
						'<td align="right">'+convertrupiah(v.potongan_item)+'</td>'+
						'<td align="right">'+convertrupiah(v.hrg_jual_net)+'</td>'+
					'</tr>'
				);
				total+=v.hrg_jual_net;
			});
			modal.find('.modal-body #tbdetilpenjualankredit >tfoot #total').text('Rp. '+convertrupiah(total));
				modal.find('.modal-body #tbdetilpenjualankredit >tfoot #terbilang').text('Terbilang : '+terbilang(total)+' Rupiah');
		}
	});
});

$('#updatekreditmodal').on('show.bs.modal',function(e){
	var modal=$(this);
	var link=$(e.relatedTarget);

	modal.find('.modal-body #frmupdatekreditmodal').prop('action','penjualan/kredit/'+link.data('id'));
});