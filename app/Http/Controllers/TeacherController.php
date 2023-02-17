<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Http\Requests\TeacherRequest;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index(){
        $teachers = Teacher::get();
        return view('admin.teacher', compact('teachers'));
    }
    public function create(){
       
    }
    public function store(TeacherRequest $request){
       $data = $request->validated();
        $teachers = Teacher::create($data);
        return redirect(route('teacher.index'))->with('success', 'Record added Successfully');
    }
    public function edit($id){
        $teachers = Teacher::find($id);
        return view('admin.teacher_edit', compact('teachers'));
    }
    public function update(Request $request, $id){
    //    $teachers = $request->validated();
       $teachers = Teacher::find($id);
       $teachers->name = $request->get('name');
       $teachers->email = $request->get('email');
       $teachers->phone = $request->get('phone');
       $teachers->update();
        return redirect(route('teacher.index'))->with('success', 'Record Updated Successfully');
    }
    public function destroy($id){
        $permissions = Teacher::find($id);
        $permissions->delete();
        return redirect(route('teacher.index'))->with('success', 'Record Delete Successfully');
    }
}
