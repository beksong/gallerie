<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Customer;
class CustomerController extends Controller
{
    public function show()
    {
    	$custs=Customer::orderBy('cust','asc')->get();
    	return view('customer.showcustomer',compact('custs'));
    }

    public function addcustomer(CustomerRequest $req)
    {
        $cust=new Customer(array(
                'cust' => $req->get('cust'),
                'telp' => $req->get('telp'),
                'alamat' => $req->get('alamat')
            ));
        $cust->save();
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Berhasil Menyimpan Data Customer');
    }

    public function update(CustomerRequest $req,$id)
    {
    	$cust=Customer::find($id);
    	$cust->update([
    			'cust' => $req->get('cust'),
                'telp' => $req->get('telp'),
                'alamat' => $req->get('alamat')
    		]);
    	\Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Berhasil Menyimpan Data Customer');
    }

    public function delete($id)
    {
    	$cust=Customer::find($id);
    	$cust->delete();
    	\Session::flash('alert-class','alert-danger');
        return redirect()->back()->with('message','Berhasil Menghapus Data Customer');
    }

    public function getcustomerdata($nama)
    {
        $cust=Customer::where('cust',$nama)->orderBy('cust','asc')->firstOrFail();
        return $cust;
    }

     public function getcustomer(Request $req,$nama)
    {
        $term=$req->get('cust');
        $custs=Customer::where('cust','LIKE',"%{$nama}%")
        ->orWhere('telp','LIKE',"%{$nama}%")->orWhere('alamat','LIKE',"%{$nama}%")->orderBy('cust','asc')->get();
        return response()->json($custs);
    }

}
