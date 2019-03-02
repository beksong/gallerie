$(document).ready(function(){
	
	$('#kd_barangc').val('');
	$('#cust').val('');
	$('#transaksi').val('');
	$('#cust_id').val('');

	$('#total').val(0);
});

$(function(){
	$('#cust').autocomplete({
		minLength:3,
		source : function(request,response){
			$.ajax({
				url : "../../ajaxcustomer/"+request.term,
				type : "get",
				data : '',
				dataType : "json",
				success : function(data){
					/*response(data);*/
					response($.map(data,function(item){
						return {
							label:item.cust+' - '+item.alamat+' - '+item.telp,
							value:item.cust,
						};
					}));
				},
				select : function(event,ui){
					$('input#transaksi').val(ui.item.JsonField);
					$('input #cust').val(ui.item.value);
				},
			});
		},
	});

	$('#cust').on('blur',function(){
		var cust=$(this).val();
		$.ajax({
			url:"../../getcustomer/"+cust,
			type:'get',
			dataType: 'json',
			success: function(data){
				$('input#cust_id').val(data.id);
			}
		});
	});
});

$(function(){
	$('#transaksi').autocomplete({
		minLength:1,
		source : function(request,response){
			$.ajax({
				url : "../../transaksi",
				type : "get",
				data : {
						term : request.term,
						},
				dataType : "json",
				success : function(data){
					/*response(data);*/
					response($.map(data,function(item){
						return {
							label:item.transaksi,
							value:item.transaksi,
						};
					}));
				},
				select : function(event,ui){
					$('input #transaksi').val(ui.item.value);
				},
			});
		},
	});
});

$(function(){
	$('#kd_barangc').autocomplete({
		minLength : 2,
		source : function(request,response){
			$.ajax({
				url : "../../namabarang/"+request.term,
				type : "get",
				data :'',
				dataType : "json",
				success : function(data){
					response (data);
				},
				select :function(event,ui){
					$('#kd_barangc').val(ui.item.value);
				}
			});
		}
	});

	$('#kd_barangc').keypress(function(ev){
		var row=0;
		row=hitungrow()+1;
		var key=(ev.keyCode ? ev.keyCode : ev.which);
		if(key=='13'){
			ev.preventDefault();
			var barang=$('#kd_barangc').val();
			$.ajax({
				url : "../../caribarang/"+barang,
				type: "get",
				dataType: "json",
				success : function(data){
					if(isNaN(data.discount)){
						alert('discount null');
					}
					console.log(data);
					$('#tbkasir tbody').append('<tr>'+
						'<td>'+row+'</td>'+
						'<td>'+
							'<input type="hidden" id="barang_id" name="barang_id[]" value="'+data.id+'" class="form-control" readonly>'+
							'<input type="text" id="kd_barang" name="kd_barang[]" value="'+data.kd_barang+'" class="form-control" readonly>'+
						'</td>'+
						'<td>'+
							'<input type="text" id="barang[]" name="barang[]" value="'+data.barang+'" class="form-control col-sm-3" readonly>'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="qty" name="qty[]" data-field="qty" onblur="hitungsubtotal()" oninvalid="this.setCustomValidity("Qty Kosong")" required class="form-control">'+
							'<span>'+data.satuan+'</span>'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="hrg_jual" name="hrg_jual[]" value="'+data.hrg_jual+'" data-field="hrg_jual" class="form-control" readonly>'+
							'<input type="hidden" min="0" id="hrg_beli" name="hrg_beli[]" value="'+data.hrg_beli+'" data-field="hrg_beli" class="form-control">'+
							'<input type="hidden" min="0" id="ongkir_pembelian" name="ongkir_pembelian[]" value="'+data.ongkir_pembelian+'" data-field="ongkir_pembelian" class="form-control">'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="discount" name="discount[]" value="'+data.discount+'" data-field="discount" class="form-control col-sm-3" readonly>'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="potongan" name="potongan[]" data-field="potongan" value="0" onblur="hitungsubtotal()" class="form-control col-sm-3">'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="subtotal" name="subtotal[]" data-field="subtotal" class="form-control col-sm-3" readonly>'+
						'</td>'+
						'<td>'+
							'<button type="button" id="btndel" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></button>'+
						'</td>'+
						'</tr>'
					);
				}
			});
			$('#kd_barangc').val('');
		}
	});
});

function hitungrow () {
	var row=$('#tbkasir >tbody >tr').length;
	return row;
}

function hitungpotongan(){
	var subtotal=0;
	//var potongan=0;
	var total=0;
	$('#tbkasir tr').each(function(){
		var qty=($(this).find("*[data-field='qty']").val());
		var hrg_jual=$(this).find("*[data-field='hrg_jual']").val();
		var disc=$(this).find("*[data-field='discount']").val();
		var pot=$(this).find("*[data-field='potongan']").val();
		
		if(!isNaN(qty) && !isNaN(hrg_jual)){
			if(!isNaN(pot)){
				disc=(disc/100*hrg_jual);
				disc=parseInt(disc)+parseInt(pot);
				hrg_jual-=disc;
				subtotal=hrg_jual*qty;
				total=parseInt(total)+parseInt(subtotal);
				console.log(total);
				$('#terbilang').text("Terbilang : "+terbilang(total)+" Rupiah");
				$(this).find("*[data-field='subtotal']").val(digitRupiah(subtotal));
			}
		}
	});
	if(!isNaN(total)){
		$('#total').val(digitRupiah(String(total)));
	}else{
		alert(total.value);
	}
}

function hitungsubtotal(){
	var subtotal=0;
	//var potongan=0;
	var total=0;
	$('#tbkasir tr').each(function(){
		
		var qty=parseInt(($(this).find("*[data-field='qty']").val()));
		var hrg_jual=parseInt($(this).find("*[data-field='hrg_jual']").val());
		var disc=parseInt($(this).find("*[data-field='discount']").val());
		var pot=parseInt($(this).find("*[data-field='potongan']").val());
		if(!isNaN(qty) && !isNaN(hrg_jual)){
			if(!isNaN(disc)){
				subtotal=(hrg_jual*qty)-(disc/100*hrg_jual*qty)-parseInt(pot);
				total=parseInt(total)+parseInt(subtotal);
				console.log(total);
				$('#terbilang').text("Terbilang : "+terbilang(total)+" Rupiah");
				$(this).find("*[data-field='subtotal']").val(digitRupiah(subtotal));
			}
		}
	});
	if(!isNaN(total)){
		$('#total').val(digitRupiah(String(total)));
	}else{
		alert(total.value);
	}
}

$('#tbkasir').on('click','button[type="button"]', function(e){
	var subtotal=$(this).closest('tr').find("[data-field='subtotal']").val();
	subtotal= subtotal.slice(0, subtotal.lastIndexOf(",")).replace(/\D/g,'');
	var total=$('#total').val();
	total=total.slice(0,total.lastIndexOf(",")).replace(/\D/g,'');
	var ntotal=parseInt(total)-parseInt(subtotal);
	$('#terbilang').text("Terbilang : "+terbilang(ntotal)+" Rupiah");
	$('#tbkasir >tfoot >tr >td').find('#total').val(digitRupiah(ntotal));
   $(this).closest('tr').remove();
});

