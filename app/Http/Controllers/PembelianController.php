<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Pembelianrequest;
use App\Pembelian;
use App\Detilpembelian;
use App\Logpembelian;
use App\Suplier;
use App\Barang;
use Carbon;
class PembelianController extends Controller
{
    public function show()
    {
    	$pems=Pembelian::where('jenis','sj')->get();
    	return view('pembelian.showpembelian',compact('pems'));
    }

    public function showsjid($faktur_id)
    {
        $pembelian=Pembelian::find($faktur_id);
        return view('pembelian.showsjid',compact('pembelian'));
    }

    public function updatesjid($pembelian_id)
    {
        $total=0;
    	$pemb=Pembelian::with('detilpembelians')->where('id',$pembelian_id)->firstOrFail();
        foreach ($pemb->detilpembelians as $key => $value) {
            $total+=$value->subtotal;
        }
    	$sups=Suplier::all();
    	return view('pembelian.editpembelian',compact('pemb','sups','total'));
    }

    public function updatepembelian(Pembelianrequest $req)
    {
        $jth_tempo=$req->get('tgl_faktur');
        $barang_id=$req->get('barang_id');
        $qty=$req->get('qty');
        $hrg_satuan=$req->get('hrg_satuan');
        $ongkir_pembelian=$req->get('ongkir_pembelian');
        /*$jth_tempo=$tgl_skrg->addDays($req->get('jth_tempo'));*/
        $subtotal=$req->get('subtotal');

        /*cek detil penjualan tidak kosong*/
        if(count($barang_id)<0){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Data Gagal Disimpan Detil Pembelian KOsong/Item Kosong');
        }

        /*cek harga satuan kosong*/
        for ($i=0; $i < count($hrg_satuan); $i++) { 
            if($hrg_satuan[$i]<=0){
                \Session::flash('alert-class','alert-danger');
                return redirect()->back()->with('message','Data Gagal Disimpan Harga Satuan Tidak Boleh Rp. 0');
            }

            /*cek qty apakah 0*/
            if($qty[$i]<=0){
                \Session::flash('alert-class','alert-danger');
                return redirect()->back()->with('message','Data Gagal Disimpan Qty Tidak Boleh - / 0');
            }
        }

        /*update pembelian*/
        $pem=Pembelian::find($req->get('pid'));
        /*simpan nilai jenis pembelian awal digunakan untuk menentukan apakah perlu mengupdate ongkir*/
        $jenis=$pem->jenis;
        /*update pembelian start*/
        $pem->update([
                'suplier_id' => $req->get('suplier_id'),
                'no_faktur' => $req->get('no_faktur'),
                'tgl_faktur' => $req->get('tgl_faktur'),
                'jth_tempo' => Carbon::parse($jth_tempo)->addDays($req->get('jth_tempo')),
                'tgl_pengiriman' => $req->get('tgl_pengiriman'),
                'tgl_terima' => $req->get('tgl_terima'),
                'no_sjpembelian' => $req->get('no_sjpembelian'),
                'jenis' => ($req->get('jth_tempo')==0) ? 'Cash' : 'Kredit'
            ]);

        /*Hapus Detil Lama*/

        $detil=Detilpembelian::where('pembelian_id',$req->get('pid'))->get();
        foreach ($detil as $key => $detillama) {
            /*update dulu stok barang*/
            $barang=Barang::find($detillama->barang_id);
            $barang->update([
                    'stok' => $barang->stok-$detillama->qty
                ]);
            /*hapus*/
            $detillama->delete();
        }

        /*buat Detil Baru*/
        for ($i=0; $i <count($barang_id) ; $i++) { 
            $detil=new Detilpembelian(array(
                    'pembelian_id' => $req->get('pid'),
                    'barang_id' => $barang_id[$i],
                    'qty' => $qty[$i],
                    'hrgsatuan' => $hrg_satuan[$i],
                    'ongkir_pembelian' => $ongkir_pembelian[$i],
                    'subtotal' =>  substr(preg_replace('~\D~','',$subtotal[$i]),0,-2)
                ));
            $detil->save();
            /*update barang*/
            $barang=Barang::find($barang_id[$i]);
            /*cek nilai jenis kalo nilainya sj lakukan update ongkir pembelian*/
            if($jenis=='sj'){
                $barang->update([
                    'stok' => $barang->stok+$qty[$i],
                    'ongkir_pembelian' => $ongkir_pembelian[$i],
                    'hrg_beli' => $hrg_satuan[$i]
                ]);
            }else{
                /*jika tidak ongkir tidak perlu diupdate*/
                $barang->update([
                    'stok' => $barang->stok+$qty[$i],
                    'hrg_beli' => $hrg_satuan[$i]
                ]);
            }
        }
         /*simpan log pembelian*/
        $log=new Logpembelian(array(
                'user_id' => \Auth::user()->id,
                'pembelian_id' => $pem->id,
                'ketlog' => 'Update Data Pembelian,Detil Pembelian' 
            ));
        $log->save();

        \Session::flash('alert-class','alert-info');
        return redirect()->back()->with('message','Data Berhasil Di Update');
    }

    public function cash()
    {
        $pems=Pembelian::where('jenis','cash')->get();
        return view('pembelian.showpembelian',compact('pems'));
    }

    public function kredit()
    {
        $pems=Pembelian::where('jenis','kredit')->get();
        return view('pembelian.showpembelian',compact('pems'));
    }
}
