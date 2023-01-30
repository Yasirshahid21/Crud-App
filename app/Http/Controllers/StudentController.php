<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

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
        //  $students = Student::where('user_id', $user_id)->get();
        //  dd($students->toArray());
        $students = User::find($user_id)->students;
        // $students= Student::with('User')->first();
        // dd($students->toArray());
        // return view('index', ['students'=>$students]);
        return view('index', Compact('students'));
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
        Student::create($request->merge(['user_id' => Auth::user()->id])->all());
        return redirect('student')->with('success', 'Record added Successfully');
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
        $users= Student::find($id);
        return view('partials.edit', ['students'=>$users]);

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
        $users= Student::find($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->address = $request->get('address');
        $users->phone = $request->get('phone');
        $users->update();
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
      $user->delete();
        return redirect('student')->with('success','Delete user successfully');
    }
}
