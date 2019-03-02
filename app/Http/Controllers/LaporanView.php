<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Penjualan;
use App\Detilpenjualan;
use App\Barang;
use App\Pembelian;
use Carbon\Carbon;
use PDF;
class LaporanView extends Controller
{
	public function show()
	{
		$juals=Penjualan::all();
		return view('laporan.rptpenjualan',compact('juals'));
	}

    public function printall()
    {
        $detils=Detilpenjualan::all();
        $rand=str_random(5);
        $pdf=PDF::loadview('laporan.pdf.printall',compact('detils'));
        $pdf->setPaper('Legal','landscape');
        return $pdf->stream($rand.'semua_penjualan.pdf');
    }

    public function previewall()
    {
        $detils=Detilpenjualan::with('penjualan')->uuget();
				//return $detils;
        $rand=str_random(5);
        return view('laporan.pdf.printall',compact('detils'));
    }

    public function showtoday()
    {
    	$hr_ini=Carbon::now()->format('Y-m-d');
    	$juals=Penjualan::where('tgl_jual',$hr_ini)->get();
    	return view('laporan.rptpenjualanhariini',compact('juals'));
    }

    public function showtimeframe()
    {
        return view('laporan.penjualantimeframe');
    }

    public function printtimeframes(Request $req)
    {
       if($req->get('tgl_awal')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Tanggal Awal Penjualan Kosong');
       }

       if($req->get('tgl_akhir')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Tanggal Akhir Penjualan Kosong');
       }
       $tgl_awal=$req->get('tgl_awal');
       $tgl_akhir=$req->get('tgl_akhir');
       $juals=Penjualan::whereBetween('tgl_jual',[$tgl_awal,$tgl_akhir])->get();
       $pdf=PDF::loadview('laporan.pdf.printtimeframes',compact('juals'));
       $pdf->setPaper('Legal','landscape');
       return $pdf->stream(str_random(5).'Penjualan_'.$tgl_awal.'_sd_'.$tgl_akhir.'.pdf');
    }

    public function getdetil($penjualan_id)
    {
        $detil=Detilpenjualan::with('barang')->where('penjualan_id',$penjualan_id)->get();
        return $detil;
    }

    public function printtoday()
    {
        $rand=str_random(5);
        $hr_ini=Carbon::now()->format('Y-m-d');
        $juals=Penjualan::where('tgl_jual',$hr_ini)->get();
        $no=1;
        $pdf=PDF::loadview('laporan.pdf.printtoday',compact('juals','no'));
        $pdf->setPaper('Legal','landscape');
        return $pdf->stream($rand.'Penjualan_Hari_ini.pdf');

    }

    public function previewtoday()
    {
        $rand=str_random(5);
        $hr_ini=Carbon::now()->format('Y-m-d');
        $juals=Penjualan::where('tgl_jual',$hr_ini)->get();
        $no=1;
        return view('laporan.pdf.printtoday',compact('juals','no'));
    }

    public function showstok()
    {
        $barangs=Barang::all();
        return view('laporan.laporanstok.stokall',compact('barangs'));
    }

    public function printstokall()
    {
        $barangs=Barang::all();
        $rand=str_random(5);
        $pdf=PDF::loadView('laporan.pdf.printstokall',compact('barangs'));
        $pdf->setPaper('Legal','landscape');
        return $pdf->stream($rand.'_stok_semua_barang.pdf');
    }

    public function showstokminimal()
    {
        $barangs=Barang::with('category','merk')->get();
        $min=array();
        foreach ($barangs as $key => $b) {
            if($b->stok<=$b->stok_min){
                array_push($min,$b);
            }
        }
        $data=json_encode($min);
        $barangs=json_decode($data);
        return view('laporan.laporanstok.stokmin',compact('barangs'));
    }

    public function printstokmin()
    {
        $barang=Barang::with('category','merk')->get();
        $min=array();
        foreach ($barang as $key => $b) {
            if($b->stok<=$b->stok_min){
                array_push($min,$b);
            }
        }
        $data=json_encode($min);
        $barangs=json_decode($data);
        $rand=str_random(5);
        $pdf=PDF::loadView('laporan.pdf.printstokall',compact('barangs'));
        $pdf->setPaper('Legal','landscape');
        return $pdf->stream($rand.'_stok_barang_minimal.pdf');
    }

    public function showtagihan()
    {
        return view('laporan.tagihantimeframes');
    }

    public function printtagihan(Request $req)
    {
        $tgl_awal=$req->get('tgl_awal');
        $tgl_akhir=$req->get('tgl_akhir');
        $rand=str_random(5);
        $pembelian=Pembelian::where('jenis','kredit')->whereBetween('jth_tempo',[$tgl_awal,$tgl_akhir])->get();
        $pdf=PDF::loadView('laporan.pdf.printtagihan',compact('pembelian'));
        $pdf->setPaper('Legal','landscape');
        return $pdf->stream($rand.'tagihan_tgl_'.$tgl_awal.'_sd_'.$tgl_akhir.'.pdf');
    }

    public function printsjpenjualan($penjualan_id)
    {
        $jual=Penjualan::find($penjualan_id);
        $pdf=PDF::loadView('laporan.pdf.sjpenjualan',compact('jual'));
        $pdf->setOption('page-width',165)->setOption('page-height',215)->setOption('margin-left',5)->setOption('margin-right',5);
        $pdf->setOption('orientation','portrait');
        return $pdf->stream(str_random(5).'sj_penjualan.pdf');
    }

    public function showkredit()
    {
        $juals=Penjualan::where('transaksi','!=','cash')->get();
        return view('laporan.kredit.showkredit',compact('juals'));
    }

    public function getpenjualan($id)
    {
        $juals=Penjualan::with(['detilpenjualans'=>function($table){
            $table->with('barang');
        },'customer','user'])->where('id',$id)->firstOrFail();
        return response()->json($juals);
    }

    public function updatekredit($id)
    {
        $jual=Penjualan::find($id);
        $jual->update([
                'transaksi' => 'cash'
            ]);
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Data Telah Diubah');
    }

    public function printkredit()
    {
        $juals=Penjualan::where('transaksi','!=','cash')->get();
        $pdf=PDF::loadView('laporan.pdf.printkredit',compact('juals'));
        $pdf->setOption('page-width',330)->setOption('page-height',215);
        return $pdf->stream(str_random(5).'_Rekap_Penjualan_Kredit.pdf');
    }
}
