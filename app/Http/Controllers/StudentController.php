<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $students = User::find($user_id)->students;
        $courses = Course::get();
        if(auth()->user()->hasRole('admin')){
            $students = Student::all();
            // dd($student->toArray());
            return view('admin.student', compact('students', 'courses'));
        }
        return view('index', compact('students', 'courses'));
        // $permissions[] = Permission::all();
        // dd($permissions->toArray());
        // $permissions = auth()->user()->hasAnyPermission(['view','create', 'delete', 'edit']);
        // dd($permissions);
        // if(Auth::user()->can('view')){
        //     return view('index', Compact('students','courses'));
        // }
        // else
        // abort('403');
        // $permission = $students->hasAnyPermission(['edit', 'create', 'delete','view']);
// dd($permission);
        // $courses = Course::get();
        //  $students = Student::where('user_id', $user_id)->get();

        //  $students = Student::where('user_id', $user_id)->get();
        //  dd($students->toArray());
        // $students = User::find($user_id)->students;
        // $students->name;
        // dd($courses->toArray());
        // foreach($students->courses()as $course){
        //     dd($course);
        // }
        // $students= Student::with('User')->first();
        // dd($students->toArray());
        // return view('index', ['students'=>$students]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        $student = Student::create($request->merge(['user_id' => Auth::user()->id])->all());
        $courses = $request->get('course');
        foreach($courses as $course){
         $course_id = $course;
         $obj = new StudentCourse();
         $obj->student_id = $student->id;
         $obj->course_id = $course_id;
         $obj->save();
        }
        return redirect(route('student.index'))->with('success', 'Record added Successfully');
        // $student->course()->attach($student);
        // $student_course->courses()->attach($courses);
        // dd(Auth()->user()->name);
        // dd(auth()->guest());
        // $validator= $request->validate(
        //         [
        //             'name' => 'required|string|max:255',
        //             'email' => 'required|string',
        //             'address' => 'required|string',
        //             'phone' => 'required|string'
        //         ]
        //     );
            // if($validator->fails()){}
            // Student::create($data);
        // $name= $request->get('name');
        // $email= $request->get('email');
        // $address= $request->get('address');
        // $phone= $request->get('phone');
        // return $request->input();
        // $students= new Student();
        // $students->name = $data('name');
        // $students->email = $data->get('email');
        // $students->address = $data->get('address');
        // $students->phone = $data->get('phone');
        // $students->user_id = Auth()->user()->id;
        // dd($students->user_id);
        // $students->save();
        // $data = $request->validated();
        // Student::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $students= Student::find($id);

        // $user_id = $students->id;
        // $courses = Student::find($user_id);
        $data = Course::get();
        return view('partials.edit', Compact('students','data'));
          // dd($courses->toArray());
        // foreach($students as $student){
        //     $user_id = $students->id;
        //     // dd($user_id);
        //     $courses = Student::find($user_id)->courses;
        //     // foreach($courses as $course){
        //     //     dd($course->name);
        //     // }
        //     // dd($courses->toArray());
        // }
        // dd($courses->id);
        // dd($courses->toArray());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validated();
        $users= Student::find($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->address = $request->get('address');
        $users->phone = $request->get('phone');
        $users->update();
        foreach($users->courses as $course){
        //  $course_id = $course->id;
        //  $obj = Course::find($course_id);
         $courses = $request->get('courses');
         $courses_id= $courses;
         $users->courses()->sync($courses_id);
        //  if(!empty($courses_id)){
        // //  foreach($courses as $course){
        // //     $course_id= $course;
        //     dd($courses_id);
        //     $users->courses()->sync($courses_id);
        //     // $users->courses()->sync([$users->id]);
        //     // dd($obj->name->toArray());
        //     // $obj->update();
        // // }
        // }
        // if (empty($courses)){
        //     $users->courses()->detach($obj->id);
        //  }
        //  $courses->name = $course;
        //  $
        }
        return redirect('student')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user= Student::find($id);
      foreach($user->courses as $course){
        StudentCourse::where('course_id',$course->id)->where('student_id',$user->id)->delete();
      }
      $user->delete();
      return redirect('student')->with('success','Delete user successfully');
           //   dd($user->id);
    //   $courses = Student::find($user->id)->courses;
    //   $courses->courses()->detach();
    //   dd($courses->toArray());
    //  $courses->delete();
    }
}
