<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuplierRequest;
use App\Suplier;

class SuplierController extends Controller
{

    public function showsuplier()
    {
    	$sups=Suplier::all();
    	return view('suplier.showsuplier',compact('sups'));
    }

    public function store(SuplierRequest $req)
    {
    	$sup=Suplier::create($req->all());
    	\Session::flash('alert-class','alert-success');
    	return redirect()->back()->with('message','Data Berhail Disimpan');
    }

    public function update(SuplierRequest $req,$id)
    {
    	$sup=Suplier::find($id)->update($req->all());
    	\Session::flash('alert-class','alert-info');
    	return redirect()->back()->with('message','Data Berhail Dirubah');
    }

    public function delete($id)
    {
    	$del=Suplier::find($id)->delete();
    	\Session::flash('alert-class','alert-warning');
    	return redirect()->back()->with('message','Data Berhail Dihapus');
    }
}
