<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Student;
use App\Http\Requests\CourseRequest;

use Illuminate\Http\Request;

class CourseController extends Controller
{


    Public function index() {

        
        
        $courses = Course::get();
        return view('admin.courses', compact('courses'));

    //     return view('index', compact('courses'));


        
    //     dd($courses->toarray());
    //     foreach ($courses as $course ) {
    //         $course->name;
    //         dd($course->name);
    //     }
    //     $courses->name;
    //     dd($courses->name);
    //     return view('admin.courses', compact('courses'));
    //     return view('index', Compact('courses'));
    //     dd($courses->toArray());
     }
     public function create(){
        //
        
     }

     public function store(CourseRequest $request){
        // $courses = $request->get('name');
        // dd($courses);
       $data = $request->validated();
      $courses = Course::create($data);
    //   dd($courses);
    //    return view('admin.courses', compact('courses'));
       return redirect(route('courses.index'))->with('success', 'Record added Successfully');
     }

     public function edit($id){
        $courses = Course::find($id);
        return view('admin.edit', Compact('courses'));

     }
     public function update(CourseRequest $request, $id){
        $course = $request->validated();
        $course = Course::find($id);
        $course->name = $request->get('name');
        $course->update();
        return redirect(route('courses.index'))->with('success', 'Course update successfully');

     }
     public function destroy($id){
        $course = Course::find($id);
        $course->delete();
        return redirect(route('courses.index'))->with('success', 'Record delete Successfully');   
     }
     
}
