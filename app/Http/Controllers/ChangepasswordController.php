<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangepasswordController extends Controller
{
    public function index()
    {
    	return view('cpass.showcpass');
    }

    public function change(Request $req)
    {
    	if($req->get('oldpass')==''){
    		return redirect()->back()->with('message','Password Lama Tidak Boleh Kosong');
    	}

    	if ($req->get('newpass')=='') {
    		return redirect()->back()->with('message','Password Baru Tidak Boleh Kosong');
    	}

    	$user=\Auth::user();
    	$user->fill([
    			'password' => \Hash::make($req->get('newpass'))
    		])->save();
    }
}
