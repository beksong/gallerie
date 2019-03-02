<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use App\Barang;
use App\Category;
use App\Merk;
use DataTables;
class BarangController extends Controller
{
    public function showbarang()
    {
    	// $barangs=Barang::with('category','merk')->get();
      // return $barangs;
    	$kats=Category::all();
    	$merks=Merk::all();
    	return view('barang.showbarang',compact('kats','merks'));
    }

    public function getBarang()
    {
      $barangs=Barang::with('category','merk')->get();
      return DataTables::of($barangs)
      ->addColumn('action',function($barang){
        return '<a href="" class="btn btn-warning" data-toggle="modal" data-target="#editbarangmodal" data-barang_id="'.$barang->id.'" data-kd_barang="'.$barang->kd_barang.'" data-category_id="'.$barang->category->id.'" data-barang="'.$barang->barang.'" data-merk_id="'.$barang->merk->id.'" data-hrg_beli="'.$barang->hrg_beli.'" data-hrg_jual="'.$barang->hrg_jual.'" data-stok="'.$barang->stok.'" data-satuan="'.$barang->satuan.'" data-stok_min="'.$barang->stok_min.'" data-discount="$barang->discount"><i class="fa fa-btn fa-pencil"></i></a><a href="" class="btn btn-danger" data-toggle="modal" data-target="#delbarangmodal" data-barang_id="'.$barang->id.'" data-kd_barang="'.$barang->kd_barang.'" data-category_id="'.$barang->category->id.'" data-barang="'.$barang->barang.'" data-merk_id="'.$barang->merk->id.'" data-hrg_beli="'.$barang->hrg_beli.'" data-hrg_jual="'.$barang->hrg_jual.'" data-stok="'.$barang->stok.'" data-satuan="'.$barang->satuan.'" data-stok_min="'.$barang->stok_min.'" data-discount="'.$barang->discount.'"><i class="fa fa-btn fa-trash"></i></a>';
      })->make(true);
    }

    public function store(BarangRequest $req)
    {
        $barang=Barang::where('kd_barang',$req->get('kd_barang'))->firstOrFail();
        if($barang!=null){
            return redirect()->back()->with('message','Gagal menyimpan kode barang ganda');
        }
        $hrg_jual=str_replace('.','',$req->get('hrg_jual'));
        $hrg_beli=str_replace('.','',$req->get('hrg_beli'));
    	$barang=new Barang(array(
                'kd_barang' => $req->get('kd_barang'),
                'category_id' => $req->get('category_id'),
                'barang' => $req->get('barang'),
                'satuan' => $req->get('satuan'),
                'hrg_beli' => $hrg_beli,
                'hrg_jual' => $hrg_jual,
                'stok' => $req->get('stok'),
                'stok_min' => $req->get('stok_min'),
                'discount' => $req->get('discount'),
                'merk_id' => $req->get('merk_id')
            ));
        $barang->save();
    	\Session::flash('alert-class','alert-success');
    	return redirect()->back()->with('message','Data Berhail Disimpan');
    }

    // public function getbarang($barang_id)
    // {
    //     $barang=Barang::find($barang_id);
    //     return $barang;
    // }

    public function update(BarangRequest $req,$barang_id)
    {
        $hrg_jual=str_replace('.','',$req->get('hrg_jual'));
        $hrg_beli=str_replace('.','',$req->get('hrg_beli'));
        $barang=Barang::find($barang_id);
        $barang->update([
                'kd_barang' => $req->get('kd_barang'),
                'category_id' => $req->get('category_id'),
                'barang' => $req->get('barang'),
                'satuan' => $req->get('satuan'),
                'hrg_beli' => $hrg_beli,
                'hrg_jual' => $hrg_jual,
                'stok' => $req->get('stok'),
                'stok_min' => $req->get('stok_min'),
                'discount' => $req->get('discount'),
                'merk_id' => $req->get('merk_id')
            ]);
        \Session::flash('alert-class','alert-info');
        return redirect()->back()->with('message','Data Berhail Dirubah');
    }

    public function delete($barang_id)
    {
        $barang=Barang::find($barang_id);
        $barang->delete();
        \Session::flash('alert-class','alert-warning');
        return redirect()->back()->with('message','Data Telah Berhasil Dihapus');
    }

    public function searchbarang(Request $req,$nama)
    {
        $results=array();
        $barangs=Barang::query()->where('barang','LIKE', "%{$nama}%")
        ->orWhere('kd_barang','LIKE',"%{$nama}%")->get();
        foreach ($barangs as $barang) {
            $ret['value']=$barang->kd_barang;
            $ret['label']=$barang->barang;

            array_push($results,$ret);
        }
        return json_encode($results);
    }

    public function searchbarangid($barang_id)
    {
        $barang=Barang::where('kd_barang','=',$barang_id)->firstOrFail();
        return $barang;
    }
}
