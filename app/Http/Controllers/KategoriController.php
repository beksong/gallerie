<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Support\Facades\Gate;
class KategoriController extends Controller
{
    public function showkategori()
    {
        $kats=Category::all();
        return view('kategori.showkategori',compact('kats'));
    }

    public function store(CategoryRequest $req)
    {
    	$create=Category::create($req->all());
        \Session::flash('alert-class','alert-success');
    	return redirect()->back()->with('message','Data Berhail Disimpan');
    }

    public function update(CategoryRequest $req,$id)
    {
        $update=Category::find($id)->update($req->all());
        \Session::flash('alert-class','alert-info');
        return redirect()->back()->with('message','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        $delete=Category::find($id)->delete();
        \Session::flash('alert-class','alert-warning');
        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }
}
