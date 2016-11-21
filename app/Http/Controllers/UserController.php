<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.index',['user' => $user]);
    }

    public function update(Request $request, $userID)
    {
        $user = User::find($userID);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with(['status' => 'Update profile successfully!']);
    }
}
