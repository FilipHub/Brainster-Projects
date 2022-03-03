<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Academy;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use App\Http\Requests\UsersUpdateProfileRequest;



class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }
    public function index()
    {
        $skills = Skill::all();
        // $projects = auth()->user()->projects()->latest()->get();
        return view('profile', array('user' => Auth::user()));
    }
    public function edit()
    {
        $academies = Academy::all();
        $skills = Skill::all();
        $user = auth()->user();
        return view('profile', compact('academies', 'skills', 'user'));
    }

    // public function edit($skills)
    // {
    //     $skills->validate(
    //         [
    //             'academy_id' => ['required'],
    //         ]
    //     );
    //     $skills = Skill::all();
    //     $user_id = auth()->user()->id;

    //     return view('auth.profile', compact('skills'));
    // }
    public function update(UsersUpdateProfileRequest $request)
    {
        $user_id = auth()->user()->id;


        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'biography' => $request->biography,
            'image' => $request->image->store('uploads/users/images', 'public'),
            // 'image' => $request->image,
        ]);
        return redirect()->back();
    }
}
