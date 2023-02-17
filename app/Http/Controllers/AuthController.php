<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function index() {
        return view('registration.login');
    }
    public function register() {
        
        return view('registration.register');
    
    }
    public function validate_registration(AuthRequest $request) {
        
        $data = $request->validated();
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=> Hash::make($data['password'])
        ]);
        

        return redirect('login')->with('success', 'Register Successfully');
    }
    public function validate_login(Request $request) {
        
        $request->validate ([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        //     $userdata = ([
        //         'email' => $request->get('email'),
        //         'password' => $request->get('password')
        // ]);
            //   dd($userdata);
        $credentails = $request->only('email', 'password');
        // dd($credentails);
        if(Auth::attempt($credentails)) {
            // dd(auth()->user()->is_admin);
            // if(auth()->user()->is_admin == 1){
            // return redirect('admin/users')->with('success', 'Login Successfully');
                
            // }
            // return redirect()->route('student.index', ['user_id'=> $id]);
            return redirect('dashboard')->with('success', 'Login Successfully');
            // $user = auth()->user();
            // dd($user);
            // $id = Auth::user()->id;
            // dd($id);
        }
        return redirect('login')->with('fail', 'Login Detail not valid');
    }
    Public function dashboard() {
        if(Auth::check()) {
         if(auth()->user()->is_admin == 1){
             return redirect('admin/users')->with('success', 'Login Successfully');                   
             }
            return redirect('student');
        }
        return redirect('login')->with('fail', 'Your not allowed');
    }    
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

}
