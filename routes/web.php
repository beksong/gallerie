<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    // return what you want
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>['auth','permission:manage_user']],function(){
	/*role*/
	Route::get('roles','Admincontroller@showrole');
	Route::post('createrole','Admincontroller@createrole');
	Route::post('updaterole/{role_id}','Admincontroller@updaterole');
	Route::post('deleterole/{role_id}','Admincontroller@deleterole');
	/*permission*/
	Route::get('permission','AdminController@show');
	Route::post('/createpermission','Admincontroller@createpermission');
	Route::post('/updatepermission/{pid}','Admincontroller@updatepermission');
	Route::get('/deletepermission/{pid}','Admincontroller@deletepermission');
	/*permission role*/
	Route::get('permissionrole','Admincontroller@showpermissionrole');
	Route::get('permissionrole/{role_id}','Admincontroller@showfrmpermissionrole');
	Route::post('permissionrole/addperms/{role_id}','Admincontroller@attachpermissionrole');
	Route::get('detachallpermissionrole/{role_id}','AdminController@detachallpermission');
	/*Role User*/
	Route::get('roleuser','AdminController@showroleuser');
	Route::post('attachroleuser/{user_id}','Admincontroller@attachroleuser');
	Route::get('detachroleuser/{user_id}','Admincontroller@detachallroleuser');
	/*Route::post('attachpermission','AdminController@create');
	Route::get('role','Admincontroller@getrole');
	Route::get('permissionuser/{role_id}','AdminController@getPermissionUser');*/
});



Route::group(['middleware'=>'auth'],function(){
	/*change password*/
	Route::get('changepass','ChangepasswordController@index');
	Route::post('changepass/change','ChangepasswordController@change');
	/*kategori*/
	Route::get('kategori','KategoriController@showkategori')->middleware('auth','permission:show_category');
	Route::post('createcategory','KategoriController@store')->middleware('permission:create_category');
	Route::post('updatecategory/{kategori_id}','KategoriController@update')->middleware('permission:update_category');
	Route::post('delcategory/{kategori_id}','KategoriController@delete')->middleware('permission:delete_category');
	/*Brand*/
	Route::get('brand','BrandController@showbrand')->middleware('permission:show_brand');
	Route::post('createbrand','BrandController@store')->middleware('permission:create_brand');
	Route::post('updatebrand/{brand_id}','BrandController@update')->middleware('permission:update_brand');
	Route::post('delbrand/{brand_id}','BrandController@delete')->middleware('permission:delete_brand');
	/*suplier*/
	Route::get('suplier','SuplierController@showsuplier')->middleware('permission:show_suplier');
	Route::post('createsuplier','SuplierController@store')->middleware('permission:create_suplier');
	Route::post('updatesuplier/{suplier_id}','SuplierController@update')->middleware('permission:update_suplier');
	Route::post('delsuplier/{suplier_id}','SuplierController@delete')->middleware('permission:delete_suplier');

	/*barang*/
	Route::get('barang','BarangController@showbarang')->middleware('permission:show_barang');
  	Route::get('barang/getdata','BarangController@getBarang')->middleware('permission:show_barang');
	Route::post('createbarang','BarangController@store')->middleware('permission:create_barang');
	Route::post('updatebarang/{barang_id}','BarangController@update')->middleware('permission:update_barang');
	Route::post('delbarang/{barang_id}','BarangController@delete')->middleware('permission:delete_barang');
	Route::get('namabarang/{nama}','BarangController@searchbarang');/*ajax request*/

	/*gudang pembelian*/
	Route::get('sjpembelian','GudangController@showsjpembelian')->middleware('permission:show_sjpembelian');
	Route::get('sjpembelian/frm','GudangController@frmsjpembelian')->middleware('permission:create_sjpembelian');
	Route::post('sjpembelian/createsjpembelian','GudangController@createsjpembelian')->middleware('permission:save_sjpembelian');
	Route::get('detilsjpembelian/{pembelian_id}','GudangController@getdetilpembelian')->middleware('permission:show_detilsjpembelian');
	/*gudang penjualan*/
	Route::get('sjpenjualan','GudangController@showsjpenjualan')->middleware('permission:show_sjpenjualan');
	Route::post('sjpenjualan/{penjualan_id}','GudangController@updatesjpenjualan')->middleware('permission:update_sjpenjualan');
	Route::get('print/sjpenjualan/{penjualan_id}','LaporanView@printsjpenjualan')->middleware('permission:print_sjpenjualan');

	/*pembelian*/
	Route::get('pembelian','PembelianController@show')->middleware('permission:show_pembeliansj');
	Route::get('pembelian/sj/{sj_id}','PembelianController@showsjid');
	Route::get('pembelian/editsj/{sj_id}','PembelianController@updatesjid')->middleware('permission:show_updatepembeliansjform');
	Route::post('pembelian/update/{pemb_id}','PembelianController@updatepembelian')->middleware('permission:updatepembeliansj');
	Route::get('pembelian/cash','PembelianController@cash')->middleware('permission:show_pembeliancash');
	Route::get('pembelian/kredit','PembelianController@kredit')->middleware('permission:show_pembeliankredit');

	/*route untuk menangani saat tombol enter pada kode barang*/
	Route::get('caribarang/{barang_id}','BarangController@searchbarangid');/*ajax request*/

	/*kasir*/
	Route::get('kasir','KasirController@show')->middleware('permission:show_kasir');
	Route::post('kasir/createnota','KasirController@create')->middleware('permission:create_kasir');
	Route::get('kasirtoday','KasirController@kasirtoday')->middleware('permission:show_kasirtoday');

	/*laporan Penjualan*/
	Route::get('penjualan/{id}','LaporanView@getpenjualan')->middleware('permission:showkredit');
	Route::post('penjualan/kredit/{id}','LaporanView@updatekredit')->middleware('permission:showkredit');
	Route::get('pdf/kredit','LaporanView@printkredit')->middleware('permission:showkredit');
	/*report pdf*/
	Route::get('rpt','LaporanView@show')->middleware('permission:show_semuapenjualan');
	Route::get('rpt/today','LaporanView@showtoday')->middleware('permission:show_penjualantoday');
	Route::get('rpt/{penjualan_id}','LaporanView@getdetil');/*ajax request*/
	Route::get('pdf/printall','LaporanView@printall')->middleware('permission:printallpenjualan');
	Route::get('pdf/previewall','LaporanView@previewall')->middleware('permission:previewallpenjualan');
	Route::get('pdf/printtoday','LaporanView@printtoday')->middleware('permission:printtodaypenjualan');
	Route::get('pdf/previewtoday','LaporanView@previewtoday')->middleware('permission:previewtodaypenjualan');
	Route::get('rpt/penjualan/timeframes','LaporanView@showtimeframe')->middleware('permission:show_penjualantimeframe');
	Route::post('pdf/timeframes','LaporanView@printtimeframes')->middleware('permission:printpenjualantimeframes');

	/*laporan stok*/
	Route::get('stok','LaporanView@showstok')->middleware('permission:show_stok');
	Route::get('pdf/printstokall','LaporanView@printstokall')->middleware('permission:printstokall');
	Route::get('stok/minimal','LaporanView@showstokminimal')->middleware('permission:show_stokminimal');
	Route::get('pdf/printstokmin','LaporanView@printstokmin')->middleware('permission:printstokmin');

	/*tagihan pembelian*/
	Route::get('tagihan','LaporanView@showtagihan')->middleware('permission:showtagihan');
	Route::post('pdf/tagihan','LaporanView@printtagihan')->middleware('permission:printtagihan');

	/*customer*/
	Route::get('customer','CustomerController@show');
	Route::post('updatecustomer/{id}','CustomerController@update');
	Route::post('deletecustomer/{id}','CustomerController@delete');
	Route::get('ajaxcustomer/{nama}','CustomerController@getcustomer');/*ajax request get Customer*/
	Route::get('getcustomer/{nama}','CustomerController@getcustomerdata');
	Route::post('addcustomer','CustomerController@addcustomer');

	Route::get('transaksi','KasirController@gettransaksi');/*ajax request get transaksi*/

	/*laporan penjualan kredit leasing*/
	Route::get('kredit','LaporanView@showkredit')->middleware('permission:showkredit');
});
