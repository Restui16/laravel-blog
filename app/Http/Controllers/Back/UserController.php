<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        if(auth()->check() && auth()->user()->role == 1)
        {
            $users = User::get();
        }
        else
        {
            $users = User::whereId(auth()->user()->id)->get( );
        }

        return view('back.user.index',
        ['users' => $users]);
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($request['password']);

        User::create($data);
        return Redirect::back()->with('success', 'User has been created');
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $data = $request->validated();

        if($data['password'] != null){
            $data['password'] = Hash::make($request['password']);
            User::find($id)->update($data);

        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role
            ]);
        }


        return Redirect::back()->with('success', 'User has been updated');


    }
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
        return response()->json([
            'message' => "Data article has been deleted"
        ]);
    }
}
