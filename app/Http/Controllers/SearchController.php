<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $search = $request['search'] ?? "";
        $user_id = Auth::user()->id;
        if ($search !=""){
            $students = Student::where('name','LIKE', '%'. $search.'%')->Where('user_id',$user_id)->get();
            $courses = Course::get();
            return view('index', Compact('students','courses'));
        }
        else{
            return view('index')->with('fail',"Record not found");
        }
    
    }
}
