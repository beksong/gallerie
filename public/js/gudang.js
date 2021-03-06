$(document).ready(function(){
	$('#total').autoNumeric('init',{
			aSep:'.',
			aDec:',',
			wEmpty:'sign',
			mDec:null,
			aSign:'Rp. '
	});
	$('#tbpembelian tr').each(function(){
		$(this).find("[data-field='subtotal']").autoNumeric('init',{
			aSep:'.',
			aDec:',',
			wEmpty:'sign',
			mDec:null,
			aSign:'Rp. '
		});
	});
	$('#tgl_terima').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat:'yy-mm-dd'
	});
	$('#tgl_terima').val('');
	$('#tgl_pengiriman').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat : "yy-mm-dd"
	});
	$('#tgl_pengiriman').val('');
	$('#tgl_faktur').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat : "yy-mm-dd"
	});
	$('#tgl_faktur').val('');
	$('#terbilang').text('Terbilang : '+terbilang($('#total').val().slice(0,-2).replace(/\D/g,''))+' Rupiah');
});

$(function(){
	$('#kd_barangc').autocomplete({
		minLength : 2,
		source : function(request,response){
			$.ajax({
				url : "../../caribarang",
				type : "get",
				data : {
					term : request.term,
				},
				dataType : "json",
				success : function(data){
					response (data);
				},
				select :function(event,ui){
					$('#kd_barang').val(ui.item.value);
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
					$('#tbpembelian tbody').append('<tr>'+
						'<td>'+row+'</td>'+
						'<td>'+
							'<input type="hidden" id="barang_id" name="barang_id[]" value="'+data.id+'" class="form-control" readonly>'+
							'<input type="text" id="kd_barang" name="kd_barang[]" value="'+data.kd_barang+'" class="form-control col-sm-2" readonly>'+
						'</td>'+
						'<td>'+
							'<input type="text" id="barang[]" name="barang[]" value="'+data.barang+'" class="form-control col-sm-3" readonly>'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="qty" name="qty[]" data-field="qty" onblur="hitungsubtotal()" oninvalid="this.setCustomValidity("Tanggal Faktur Pembelian Barang Tidak Boleh Kosong")" required class="form-control col-sm-2">'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="hrg_satuan" name="hrg_satuan[]"  onblur="hitungsubtotal()" oninvalid="this.setCustomValidity("Tanggal Faktur Pembelian Barang Tidak Boleh Kosong")" required data-field="hrg_satuan" class="form-control col-sm-3">'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="ongkir_pembelian" name="ongkir_pembelian[]"  onblur="hitungsubtotal()" oninvalid="this.setCustomValidity("Tanggal Faktur Pembelian Barang Tidak Boleh Kosong")" required data-field="hrg_satuan" class="form-control col-sm-3">'+
						'</td>'+
						'<td>'+
							'<input type="text" min="0" id="subtotal" name="subtotal[]" data-field="subtotal" class="form-control col-sm-3" readonly>'+
						'</td>'+
						'<td>'+
							'<button type="button" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></button>'+
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
	var row=$('#tbpembelian >tbody >tr').length;
	return row;
}

function hitungsubtotal(){
	var subtotal=0;
	var tot=0;
	var x=0;
	$('#tbpembelian tr').each(function(){
		$(this).find("#subtotal").autoNumeric('init',{
			aSep:'.',
			aDec:',',
			wEmpty:'sign',
			mDec:null,
			aSign:'Rp. '
		});
	});
	$('#tbpembelian tr').each(function(){
		var qty=($(this).find("*[data-field='qty']").val());
		var hrg_satuan=$(this).find("*[data-field='hrg_satuan']").val();
		if(!isNaN(qty) && !isNaN(hrg_satuan)){
			subtotal=qty*hrg_satuan;
			tot+=subtotal;
			$(this).find("*[data-field='subtotal']").autoNumeric('set',subtotal);
			$('#total').autoNumeric('set',tot);
			$('#terbilang').text('Terbilang : '+terbilang(tot)+' Rupiah');
		}
	});
}

$('#tbpembelian').on('click', 'button[type="button"]', function(e){
	var subtotal=$(this).closest('tr').find("[data-field='subtotal']").val();
	subtotal= subtotal.slice(0, -2).replace(/\D/g,'');
	var total=$('#total').val();
	total=total.slice(0,-2).replace(/\D/g,'');
	var ntotal=total-subtotal;
	$('#tbpembelian >tfoot >tr >td').find('#total').autoNumeric('set',ntotal);
   $(this).closest('tr').remove();
});

