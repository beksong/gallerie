$('#tbbarang').DataTable({
	processing :true,
	serverSide : true,
	ajax: 'barang/getdata',
	columns: [
		{data : 'id',name:"id"},
		{data : 'kd_barang', name:'kd_barang'},
		{data : 'category.kategori' ,name:'category.kategori'},
		{data : 'barang',name:'barang'},
		{data : 'merk.brand',name:'merk.brand'},
		{data : 'hrg_beli',name:'hrg_beli'},
		{data : 'hrg_jual',name:'hrg_jual'},
		{data : 'stok',name:'stok'},
		{data : 'satuan',name:'satuan'},
		{data : 'stok_min',name:'stok_min'},
		{data : 'discount',name:'discount'},
		{data : 'action',name:'action'}
	]

});

$('#tbstokall').DataTable({
});

$('#tbkategori').DataTable({

});

$('#tbsuplier').DataTable({

});

$('#tbbrand').DataTable({

});

$('#tbfaktur').DataTable({

});

$('#tbrpthariini').DataTable({

});

$('#tbsjpembelian').DataTable({

});

$('#tbpermissionuser').DataTable({

});

$('#tbcustomer').DataTable({

});

$('#tbfakturid').DataTable({
	"aoColumnDefs": [ {
    "aTargets": [ 4,5 ],render:$.fn.dataTable.render.number('.',',',0,'Rp. ')
	}],
});
function convertrupiah(nominal){
	var nom=nominal;
	var reverse=nom.toString().split('').reverse().join('');
	var ribuan=reverse.match(/\d{1,3}/g);
	var format=ribuan.join('.').split('').reverse().join('');
	/*if(ribuan!='null'){
		format=ribuan.join('.').split('').reverse().join('');
	}*/
	return format;
}
