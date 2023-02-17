<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index(Request $request){
        //
    if($request->has('_token')){
        $role_id = $request->get('role');
        $all_role = Role::all();
        $roles = Role::find($role_id);
        // $user_id = $request->get('role');
        // $all_user = User::all();
        // $users = User::find($user_id);
        $modules = Permission::select('module')->distinct()->orderBy('module')->get()->toArray();
        return view('admin.index', compact('modules','roles', 'all_role'));
    }
    else{
        $all_role = Role::all();
        // $users = User::all();
        $role = auth()->user()->hasRole('admin');
        $roles = Role::find($role);
        $modules = Permission::select('module')->distinct()->orderBy('module')->get()->toArray();
        return view('admin.index', compact('modules', 'roles', 'all_role'));
    }
}

public function update(Request $request, $id){

        $permissions = $request->get('permission');
        // $user = Role::find($id);
        // $user->syncPermissions($permissions);
        $role = Role::find($id);
        $role->syncPermissions($permissions);
        return redirect(route('users'))->with('success', 'Record Updated Successfully');
    }

}
