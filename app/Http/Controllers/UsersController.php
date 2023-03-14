<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\UserRequest;
use App\Events\SendMail;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use Event;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
        // return UserResource::collection($users);
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
        // $validator= $request->validate(
        //         [
        //             'name' => 'required|string|max:255',
        //             'email' => 'required|string',
        //             'address' => 'required|string',
        //             'phone' => 'required|string'
        //         ]
        //     );
        // if($validator->fails()){}

        // $name= $request->get('name');
        // $email= $request->get('email');
        // $address= $request->get('address');
        // $phone= $request->get('phone');
        // return $request->input();
        // $users= new user();
        // $users->name = $name;
        // $users->email = $email;
        // $users->address = $address;
        // $users->phone = $phone;
        // $users->save();
        $data = $request->validated();
        User::create($data);
        return redirect('/users')->with('success', 'Record added Successfully');
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
        $users = User::find($id);
        $permissions = Permission::all();
        return view('admin.users_edit', compact('users', 'permissions'));
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
        $users = User::find($id);
        $user_id = $users->id;
        Event::dispatch(new SendMail($user_id));
        $permissions = $request->get('permission');
        $users->syncPermissions($permissions);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->update();
        return redirect(route('user.index'))->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $user = User::find($id);
            $user->delete();
            return redirect(route('user.index'))->with('success', 'Delete user successfully');
        });
    }
}
