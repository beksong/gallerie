<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Merk;
class BrandController extends Controller
{
    public function showbrand()
    {
    	$merks=Merk::all();
    	return view('brand.showbrand',compact('merks'));
    }

    public function store(BrandRequest $req)
    {
    	$create=Merk::create($req->all());
        \Session::flash('alert-class','alert-success');
    	return redirect()->back()->with('message','Data Berhail Disimpan');
    }

    public function update(BrandRequest $req,$id)
    {
        $update=Merk::find($id)->update($req->all());
        \Session::flash('alert-class','alert-info');
        return redirect()->back()->with('message','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        $delete=Merk::find($id)->delete();
        \Session::flash('alert-class','alert-warning');
        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }
}
