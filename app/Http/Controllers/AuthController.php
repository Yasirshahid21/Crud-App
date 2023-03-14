<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\User;
use App\Traits\ImageTrait;
use App\Jobs\SendEmailJob;


class AuthController extends Controller
{
    //
    use ImageTrait;
    public function index()
    {
        return view('registration.login');
    }
    public function register()
    {

        return view('registration.register');
    }
    public function validate_registration(AuthRequest $request)
    {

        $data = $request->validated();
        $input = $this->verifyAndUpload($request, 'image', 'images');
        $user_email = $data['email'];
        // dd($user_email);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'path' => $input
        ]);
        $token = $user->createToken('apptoken')->plainTextToken;
        $reposne = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];
        dispatch(new SendEmailJob($user_email))->delay(now()->addSeconds(5));
        // return response($reponse);
        return response()->json($reposne, 200);
        // return redirect('login')->with('success', 'Register Successfully');
    }
    public function validate_login(Request $request)
    {

        $request->validate([
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
        if (Auth::attempt($credentails)) {
            $user = Auth::user();
            $token = $user->createToken('apptoken')->plainTextToken;
            $reponse = [
                'success' => true,
                'user' => $user,
                'token' => $token
            ];
            return response()->json($reponse, 200);
            // return redirect('dashboard')->with('success', 'Login Successfully');
            // $user = auth()->user();
            // dd($user);
            // $id = Auth::user()->id;
            // dd($id);
        }
        $reponse = [
            'success' => false,
            'message' => 'unauthorized'
        ];
        return response()->json($reponse);
        // return redirect('login')->with('fail', 'Login Detail not valid');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            if (auth()->user()->is_admin == 1) {
                return redirect('admin/users')->with('success', 'Login Successfully');
            }
            return redirect('student');
        }
        return redirect('login')->with('fail', 'Your not allowed');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
