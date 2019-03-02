	var labatotal=0;
	$('#tbprintall tbody tr').each(function(){
		var nominal =$(this).find('#hrg_beli').text();
		$(this).find('#hrg_beli').text(convertrupiah(nominal));
		nominal =$(this).find('#hrg_jual').text();
		$(this).find('#hrg_jual').text(convertrupiah(nominal));
		nominal =$(this).find('#nom_discount').text();
		$(this).find('#nom_discount').text(convertrupiah(nominal));
		nominal =$(this).find('#hrg_jual_discount').text();
		$(this).find('#hrg_jual_discount').text(convertrupiah(nominal));
		nominal =$(this).find('#potongan_item').text();
		$(this).find('#potongan_item').text(convertrupiah(nominal));
		nominal =$(this).find('#ongkir_pembelian').text();
		$(this).find('#ongkir_pembelian').text(convertrupiah(nominal));
		nominal =$(this).find('#hrg_jual_net').text();
		$(this).find('#hrg_jual_net').text(convertrupiah(nominal));
		nominal =$(this).find('#laba').text();
		labatotal=parseInt(labatotal,10)+parseInt(nominal,10);
		if(nominal<0){
			$(this).find('#laba').text('-'+convertrupiah(nominal));
		}else{
			$(this).find('#laba').text(convertrupiah(nominal));
		}
	});
	/*buat variabel boolean untuk menandai negatif apa tidak*/
	var negatif=false;
	$('#tbprintall tfoot tr').each(function(){
		if(labatotal<0){
			negatif=true;
			$(this).find('#labatotal').text('-'+convertrupiah(labatotal));
			/*ubah labatotal ke string*/
			labatotal=labatotal.toString();
			/*hilangkan tanda negatif*/
			labatotal=labatotal.replace(/[^\d]/g, '');
			/*convert ke integer*/
			labatotal=parseInt(labatotal,10);
			/*cek negatif true or false*/
			if(negatif===true){
				$(this).find('#terbilang').text('Terbilang : Minus '+terbilang(labatotal)+' Rupiah');
			}else{
				$(this).find('#terbilang').text('Terbilang : '+terbilang(labatotal)+' Rupiah');
			}
		}else{
			$(this).find('#labatotal').text(convertrupiah(labatotal));
			if(negatif===true){
				$(this).find('#terbilang').text('Terbilang : Minus '+terbilang(labatotal)+' Rupiah');
			}else{
				$(this).find('#terbilang').text('Terbilang : '+terbilang(labatotal)+' Rupiah');
			}
		}
	});

	var minus=false;
	var total=0;
	$('#tbprinttagihan tbody tr').each(function(){
		var nominal =$(this).find('#hrgsatuan').text();
		$(this).find('#hrgsatuan').text(convertrupiah(nominal));
		nominal =$(this).find('#ongkir').text();
		$(this).find('#ongkir').text(convertrupiah(nominal));
		nominal =$(this).find('#subtotal').text();
		$(this).find('#subtotal').text(convertrupiah(nominal));
		total=parseInt(total,10)+parseInt(nominal,10);
	});

	$('#tbprinttagihan tfoot tr').each(function(){
		if(total<0){
			$(this).find('#total').text('- '+convertrupiah(total));
			$(this).find('#terbilang').text('Terbilang : Minus '+terbilang(total)+' Rupiah');
		}else{
			$(this).find('#total').text(convertrupiah(total));
			$(this).find('#terbilang').text('Terbilang : '+terbilang(total)+' Rupiah');
		}
	});

	var grandtotal=0;
	var neg=false;
	$('#tbprintnotapenjualan tbody tr').each(function(){
		nominal =$(this).find('#hrg_jual').text();
		$(this).find('#hrg_jual').text(convertrupiah(nominal));
		nominal =$(this).find('#nom_discount').text();
		$(this).find('#nom_discount').text(convertrupiah(nominal));
		nominal =$(this).find('#potongan_item').text();
		$(this).find('#potongan_item').text(convertrupiah(nominal));
		nominal =$(this).find('#hrg_jual_net').text();
		$(this).find('#hrg_jual_net').text(convertrupiah(nominal));

		grandtotal=parseInt(grandtotal,10)+parseInt(nominal,10);
	});

	$('#tbprintnotapenjualan tfoot tr').each(function(){
		$(this).find('#grandtotal').text(convertrupiah(grandtotal));
		$(this).find('#terbilang').text('Terbilang : '+terbilang(grandtotal)+' Rupiah');
	});

function convertrupiah(nominal){
	var nom=nominal;
	var reverse=nom.toString().split('').reverse().join('');
	var ribuan=reverse.match(/\d{1,3}/g);
	var format=ribuan.join('.').split('').reverse().join('');
	
	return format;
}

var totkredit=0;
$('#tbprintkredit tbody tr').each(function(){
	nominal =$(this).find('#hrg_jual').text();
	$(this).find('#hrg_jual').text(convertrupiah(nominal));
	nominal =$(this).find('#nom_discount').text();
	$(this).find('#nom_discount').text(convertrupiah(nominal));
	nominal =$(this).find('#hrg_jual_discount').text();
	$(this).find('#hrg_jual_discount').text(convertrupiah(nominal));
	nominal =$(this).find('#hrg_jual_net').text();
	$(this).find('#hrg_jual_net').text(convertrupiah(nominal));
	totkredit=parseInt(totkredit,10)+parseInt(nominal,10);
});

$('#tbprintkredit tfoot tr').each(function(){
	$(this).find('#total').text(convertrupiah(totkredit));
	$(this).find('#terbilang').text('Terbilang : '+terbilang(totkredit)+' Rupiah');

});