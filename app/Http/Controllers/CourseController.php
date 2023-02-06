<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Student;

use Illuminate\Http\Request;

class CourseController extends Controller
{


    Public function retrive() {

        
        
        $courses = Course::get();
        // return view('partials.test', compact('courses'));

        // return view('index', compact('courses'));


        
        // dd($courses->toarray());
        // foreach ($courses as $course ) {
        //     $course->name;
        //     dd($course->name);
        // }
        // $courses->name;
        // dd($courses->name);
        // return view('index', compact('courses'));
        // return view('index', Compact('courses'));
        // dd($courses->toArray());
    }
}
