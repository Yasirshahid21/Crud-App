<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        //
        $search = $request['search'] ?? "";
        $user_id = Auth::user()->id;
        // dd($search);
        if ($search !=""){
            $students = Student::where('name','LIKE', '%'. $search.'%')->Where('user_id',$user_id)->get();
            // dd($students->toArray());
            return view('index', Compact('students'));
        }
        else{
            // $students = Student::all();
            return view('index',Compact('students'))->with('fail',"Record not found");
        }
    
    }
}
