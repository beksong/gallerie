<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Pembelianrequest;
use App\Http\Requests\Sjpembelianrequest;
use App\Pembelian;
use App\Detilpembelian;
use App\Suplier;
use App\Barang;
use App\Penjualan;
use App\Logpembelian;
use App\Logpenjualan;
use Carbon;
class GudangController extends Controller
{
    /*sjpembelian*/
    public function showsjpembelian()
    {
        $pembs=Pembelian::orderBy('id','desc')->get();
        return view('gudang.showsjpembelian',compact('pembs'));
    }

    public function frmsjpembelian()
    {
        $sups=Suplier::all();
        return view('gudang.addsjpembelian',compact('sups'));
    }

    public function createsjpembelian(Sjpembelianrequest $req)
    {
        /*cek apakah item kosong*/
        $barang_id=$req->get('barang_id');
        $kd_barang=$req->get('kd_barang');
        $qty=$req->get('qty');
        /*return $req->all();*/
        if(count($barang_id)>0){
            /*cek apakah quantity minus*/
            for ($i=0; $i < count($qty) ; $i++) { 
                if($qty[$i]<1){
                    \Session::flash('alert-class','alert-danger');
                    return redirect()->back()->with('message','Data Gagal Disimpan Qty kurang dari 1');
                }
            }

            /*input pembelian*/
            $pem=new Pembelian(array(
                    'suplier_id' => $req->get('suplier_id'),
                    'no_faktur' => $req->get('no_faktur'),
                    'no_sjpembelian' => $req->get('no_sjpembelian'),
                    'tgl_pengiriman' => $req->get('tgl_pengiriman'),
                    'tgl_terima' => $req->get('tgl_terima'),
                    'jenis' => 'sj',
                    'user_id' => \Auth::user()->id
                ));

            $pem->save();
            $pid=$pem->id;
            /*input detil pembelian*/
            for ($i=0; $i < count($barang_id); $i++) { 
                $detp=new Detilpembelian(array(
                        'pembelian_id' => $pid,
                        'barang_id' => $barang_id[$i],
                        'qty' => $qty[$i],
                        'hrgsatuan' => 0,
                        'subtotal' => 0,
                    ));
                $detp->save();

                /*update stok barang*/

                $barang=Barang::find($barang_id[$i]);
                $barang->update([
                        'stok' => $barang->stok+$qty[$i]
                    ]);
            }
            /*simpan log pembelian*/
            $log=new Logpembelian(array(
                    'user_id' => \Auth::user()->id,
                    'pembelian_id' => $pid,
                    'ketlog' => 'Input Surat Jalan Baru' 
                ));
            $log->save();

             \Session::flash('alert-class','alert-success');
            return redirect()->back()->with('message','Data Telah Tersimpan');
        }
        \Session::flash('alert-class','alert-danger');
        return redirect()->back()->with('message','Item Barang Tidak Ada');
    }

    public function getdetilpembelian($pembelian_id)
    {
        $detil=Detilpembelian::with('barang')->where('pembelian_id',$pembelian_id)->get();
        return $detil;
    }

    /*sj penjualan*/
    public function showsjpenjualan()
    {
        $juals=Penjualan::all();
        return view('gudang.showsjpenjualan',compact('juals'));
    }

    public function updatesjpenjualan(Request $req,$penjualan_id)
    {
        if($req->get('tgl_kirim')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Tanggal Pengiriman Tidak Boleh Kosong');
        }

        if($req->get('sopir')==null){
             \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Sopir Belum Diinput');
        }

        $jual=Penjualan::find($penjualan_id);
        $jual->update([
                'tgl_kirim'=> $req->get('tgl_kirim'),
                'sopir' => $req->get('sopir'),
                'status'=> 'Terkirim',
                'gudang' => \Auth::user()->name
            ]);
        /*simpan log*/
        $logjual=new Logpenjualan(array(
                'user_id' => \Auth::user()->id,
                'penjualan_id' => $penjualan_id,
                'description' => 'update penjualan on surat jalan'
            ));

        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Data Telah Diubah');

    }
}
