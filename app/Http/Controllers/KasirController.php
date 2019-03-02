<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KasirRequest;
use App\Barang;
use App\Penjualan;
use App\Detilpenjualan;
use App\Logpenjualan;
use App\Customer;
use App\Transaksi;
use PDF;
use Carbon;
class KasirController extends Controller
{
    public function show()
    {
    	return view('kasir.kasir');
    }

    public function create(KasirRequest $req)
    {
    	$barang_id=$req->get('barang_id');
    	$tgl_jual=$req->get('tgl_jual');
    	$qty=$req->get('qty');
      $transaksi=$req->get('transaksi');
    	$hrg_jual=$req->get('hrg_jual');
    	$hrg_beli=$req->get('hrg_beli');
    	$discount=$req->get('discount');
    	$subtotal=$req->get('subtotal');
      $potongan=$req->get('potongan');
    	$total=$req->get('total');
      $ongkir_pembelian=$req->get('ongkir_pembelian');
      $nom_discount=array();
      $hrg_jual_discount=array();
        if (count($barang_id)>0) {
            /*cek tidak ada stok barang yang kurang dari satu*/
            $cek=0;
            for ($i=0; $i <count($barang_id) ; $i++) {
                $barang=Barang::find($barang_id[$i]);
                if ($barang->stok<1) {
                    $cek=1;
                }

                /*cek tidak ada stok barang yang minus setelah submit*/
                if($barang->stok-$qty[$i]<0){
                    $cek=1;
                }
            }

            /*cek apakah ada customer id*/
            if($req->get('cust_id')==null){
                \Session::flash('alert-class','alert-danger');
                return redirect()->back()->with('message','Pastikan anda mengetik nama customer dengan benar/data customer tidak ada dalam database');
            }

            if($cek==1){
                \Session::flash('alert-class','alert-danger');
                return redirect()->back()->with('message','Gagal Menyimpan Data Stok Barang Tidak Ada/Kurang');
            }else{
                /*ambil tanggal dan tahun skrg*/
                $skrg=Carbon::now();
                $bln=$skrg->month;
                switch ($bln) {
                    case '1':
                        $bln='I';
                        break;
                    case '2':
                        $bln='II';
                        break;
                    case '3':
                        $bln='III';
                        break;
                    case '4':
                        $bln='IV';
                        break;
                    case '5':
                        $bln='V';
                        break;
                    case '6':
                        $bln='VI';
                        break;
                    case '7':
                        $bln='VII';
                        break;
                    case '8':
                        $bln='VIII';
                        break;
                    case '9':
                        $bln='IX';
                        break;
                    case '10':
                        $bln='X';
                        break;
                    case '11':
                        $bln='XI';
                        break;
                    default:
                        $bln='XII';
                        break;
                }

                $jual_id=Penjualan::max('id');

                $jual=new Penjualan(array(
                        'tgl_jual' => $tgl_jual,
                        'no_nota' => '00'.($jual_id+1).'/IVC/GALERIE/'.$bln.'/'.$skrg->year,
                        'no_sjpenjualan' => '00'.($jual_id+1).'/DO/GALERIE/'.$bln.'/'.$skrg->year,
                        'user_id' => \Auth::user()->id,
                        'customer_id' => $req->get('cust_id'),
                        'transaksi' => $transaksi
                    ));
                $jual->save();

                for ($i=0; $i < count($hrg_jual) ; $i++) {
                    array_push($nom_discount,($hrg_jual[$i]*$discount[$i])/100);
                    array_push($hrg_jual_discount,$hrg_jual[$i]-$nom_discount[$i]);
                }

                for ($i=0; $i < count($hrg_jual) ; $i++) {
                    array_push($hrg_jual_discount,$hrg_jual[$i]-$nom_discount[$i]);
                }

                /*simpan detil penjualan*/
                for ($i=0; $i <count($barang_id) ; $i++) {
                    $det=new Detilpenjualan(array(
                            'penjualan_id' => $jual->id,
                            'barang_id' => $barang_id[$i],
                            'qty' => $qty[$i],
                            'hrg_jual' => $hrg_jual[$i],
                            'hrg_beli' => $hrg_beli[$i],
                            'discount' => $discount[$i]!='null' ? $discount[$i] : 0,
                            'nom_discount' => $nom_discount[$i]*$qty[$i],
                            'hrg_jual_discount' => $hrg_jual_discount[$i]*$qty[$i],
                            'potongan_item' => $potongan[$i],
                            'hrg_jual_net' => ($hrg_jual_discount[$i]-$potongan[$i])*$qty[$i],
                            'ongkir_pembelian' => $ongkir_pembelian[$i]
                        ));
                    $det->save();
                }

                /*update barang*/
                for ($i=0; $i <count($barang_id); $i++) {
                    $b=Barang::find($barang_id[$i]);
                    $b->update([
                            'stok' => $b->stok-$qty[$i]
                        ]);
                }

                /*simpan log*/
                $logjual=new Logpenjualan(array(
                        'user_id' => \Auth::user()->id,
                        'penjualan_id' => $jual->id,
                        'description' => 'create new penjualan'
                    ));
                $logjual->save();
            }

            $pdf=PDF::loadView('laporan.pdf.notapenjualan',compact('jual'));
            $pdf->setOption('page-width',215);
            $pdf->setOption('page-height',330);
            $pdf->setOption('margin-left',5);
            $pdf->setOption('margin-right',5);
            $pdf->setOption('orientation','landscape');
            return $pdf->stream(str_random(5).'_invoice_'.$jual->no_nota.'.pdf');
        }else{
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Gagal Menyimpan Data Item Penjualan Kosong');
        }
    }

    public function kasirtoday()
    {
        $juals=Penjualan::where('user_id','=',\Auth::User()->id)->orderBy('created_at','desc')->get();
        return view('kasir.kasirtoday',compact('juals'));
    }

    public function gettransaksi()
    {
        $trans=Transaksi::all();
        return response()->json($trans);
    }

}
