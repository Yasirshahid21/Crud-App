<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    //
    public function index(){
        // $permissions = Permission::paginate(5);
        $permissions = Permission::all();
        return view('admin.permission', compact('permissions'));
    }
    public function create(){

    }
    public function store(PermissionRequest $request){
       $permisson = $request->validated();
        $permissions = Permission::create($permisson);
        return redirect(route('permissions.index'))->with('success', 'Record added Successfully');
    }
    public function edit($id){
        $permissions = Permission::find($id);
        return view('admin.permission_edit', compact('permissions'));
    }
    public function update(PermissionRequest $request, $id){
       $permissions = $request->validated();
        $permissions = Permission::find($id);
        $permissions->name = $request->get('name');
        $permissions->update();
        return redirect(route('permissions.index'))->with('success', 'Record Updated Successfully');
    }
    public function destroy($id){
        $permissions = Permission::find($id);
        $permissions->delete();
        return redirect(route('permissions.index'))->with('success', 'Record Delete Successfully');
    }
}
