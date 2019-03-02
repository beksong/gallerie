<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\User;
use App\Role;
use App\Permission;

class AdminController extends Controller
{
    public function show()
    {
    	$perms=Permission::all();
    	return view('permission.showpermission',compact('perms'));
    }

    public function createpermission(Request $req)
    {
        if($req->get('permission_name')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Permission Name tidak boleh kosong');
        }

        if($req->get('description')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Description tidak boleh kosong');
        }

        $p=new Permission(array(
                'name' => $req->get('permission_name'),
                'display_name' => $req->get('permission_name'),
                'description' => $req->get('description')
            ));
        $p->save();
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Berhasil Menambah Data Permission');
    }

    public function updatepermission(Request $req,$pid)
    {
        if($req->get('permission_name')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Permission Name tidak boleh kosong');
        }

        if($req->get('description')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Description tidak boleh kosong');
        }
        $p=Permission::find($pid);
        $p->update([
                'name' => $req->get('permission_name'),
                'display_name' => $req->get('permission_name'),
                'description' => $req->get('description')
            ]);
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Berhasil Merubah Data Permission');
    }

    public function deletepermission($id)
    {
        $p=Permission::find($id);
        $p->delete();
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Berhasil Menghapus Data Permission');
    }

    /*permission role*/
    public function showpermissionrole()
    {
        $roles=Role::all();
        return view('permissionrole.showpermissionrole',compact('roles'));
    }

    public function showfrmpermissionrole($role_id)
    {
        $role=Role::find($role_id);
        $permissions=Permission::all();
        $pid=array();
        foreach ($role->perms as $key => $p) {
            array_push($pid,$p->id);
        }
        return view('permissionrole.showfrmaddpermissionrole',compact('role','pid','permissions'));
    }

    public function attachpermissionrole(Request $req,$role_id)
    {
        if($req->get('permission_id')==null){
            \Session::flash('alert-class','alert-danger');
            return redirect()->back()->with('message','Tidak Ada Permission Dipilih');
        }
        $role=Role::find($role_id);
        if($role->perms()!==null){
            if($role->name!=='Administrator'){
                $role->perms()->sync([]);
                foreach ($req->get('permission_id') as $key => $p) {
                    $permission=Permission::find($p);
                    $role->attachPermission($permission);
                }
            }else{
                $role->perms()->sync([]);
                $permission=Permission::all();
                foreach ($permission as $key => $p) {
                    $role->attachPermission($p);
                }
            }
        }
        \Session::flash('alert-class','alert-success');
        return redirect('permissionrole')->with('message','Berhasil Menambahkan Permission Ke Role');
    }

    public function detachallpermission($role_id)
    {
        $role=Role::find($role_id);
        $role->perms()->sync([]);
        \Session::flash('alert-class','alert-success');
        return redirect('permissionrole')->with('message','Berhasil Menghapus Semua Permission dari Role');

    }

    public function attachroleuser(Request $req,$user_id)
    {
        $user=User::find($user_id);
        $role=Role::find($req->get('role_id'));
        if($user->hasRole($role->name)){
            \Session::flash('alert-class','alert-info');
            return redirect()->back()->with('message','User Sudah Punya Hak Akses Tersebut');    
        }
        $user->attachRole($req->get('role_id'));
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Hak Akses Telah Ditambahkan');
    }

    public function detachallroleuser($user_id)
    {
        $user=User::find($user_id);
        $user->roles()->sync([]);
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Hak Akses Telah Dihapus');
    }

    public function getPermissionUser($role_id)
    {
        $role=Role::find($role_id);
        return $role->perms;
    }

    public function showrole()
    {
        $roles=Role::all();
        return view('role.showrole',compact('roles'));
    }

    public function createrole(RoleRequest $req)
    {
        $role=new Role(array(
                'name' => $req->get('role_name'),
                'display_name' => $req->get('role_name'),
                'description' => $req->get('description')
            ));
        $role->save();
        \Session::flash('alert-class','alert-success');
        return redirect()->back()->with('message','Role Telah Ditambahkan');
    }

    public function updaterole(RoleRequest $req,$role_id)
    {
        $role=Role::find($role_id);
        $role->update([
                'name' => $req->get('role_name'),
                'display_name' => $req->get('role_name'),
                'description' => $req->get('description')
            ]);
        \Session::flash('alert-class','alert-info');
        return redirect()->back()->with('message','Role Telah Diupdate');
    }

    public function deleterole($role_id)
    {
        $role=Role::findOrFail($role_id);
       /* return $role;*/
        $role->perms()->sync([]);  
        Role::where('id',$role_id)->delete();  
        \Session::flash('alert-class','alert-info');
        return redirect()->back()->with('message','Role Telah Dihapus');
    }

    public function showroleuser()
    {
        $roles=Role::all();
        $users=User::all();
        return view('role.showroleuser',compact('roles','users'));
    }
}
