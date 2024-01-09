<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $userId = auth()->user()->id;
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'min:8|confirmed',
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        //$file_name = $request->has('image') ? time() . '.' . $request->image->getClientOriginalExtension() : 'default.jpg';
        $file_path = $request->has('image') ? $request->file('image')->storeAs('userProfileImage', (time() . '.' . $request->image->getClientOriginalExtension()), 'public') : 'userProfileImage/default.jpg';
        $data['image'] = $file_path;
        $data['password'] = $request->has('password') ? Hash::make($request->password) : auth()->user()->password;
        User::findOrFail($userId)->update($data);
        return back();
    }
}
