<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $categories = Category::getCategories();
        return view('profile.index',[
            'user' => $user,
            'categories' => $categories
        ]);
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

    public function changePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $user->password))
        {
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back();
        }

        return redirect()->back();
    }
}
