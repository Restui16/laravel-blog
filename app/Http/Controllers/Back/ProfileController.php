<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('back.profile.show', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'nullable|min:8|confirmed',
            'password_confirmation' => 'nullable|min:8|required_with:password'
        ]);

        if($data['password'] != null){
            $data['password'] = Hash::make($request['password']);
            User::find($id)->update($data);
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        return Redirect::back()->with('success', 'Profile has been Updated');

    }
}
