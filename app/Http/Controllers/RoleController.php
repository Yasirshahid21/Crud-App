<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;


class RoleController extends Controller
{
     //
     public function index() {
        $roles = Role::get();
        return view('admin.role', compact('roles'));
    }
    public function create() {

    }
    public function store(RoleRequest $request) {
       $role = $request->validated();
        $roles = Role::create($role);
        return redirect(route('roles.index'))->with('success', 'Record added Successfully');
    }
    public function edit($id) {
        $roles = Role::find($id);
        $permissions = Permission::all();
        return view('admin.role_edit', compact('roles','permissions'));
    }
    public function update(RoleRequest $request, $id) {
        //
        $permissions = $request->get('permission');
        // dd($permissions);
        // $role->syncPermissions($permissions)
        $roles = Role::find($id);
        $roles->name = $request->get('name');
        $roles->update();
        $roles->syncPermissions($permissions);
        return redirect(route('roles.index'))->with('success', 'Record Updated Successfully');
    }
    public function destroy($id){
        $roles = Role::find($id);
        $roles->delete();
        return redirect(route('roles.index'))->with('success', 'Record Delete Successfully');
    }
}
