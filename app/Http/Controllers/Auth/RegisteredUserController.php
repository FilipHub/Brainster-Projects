<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Skill;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\UsersUpdateProfileRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $academies = Academy::all();
        $skills = Skill::all();
        return view('auth.register', compact('academies', 'skills'));
    }

    public function edit()
    {
        $academies = Academy::all();
        $skills = Skill::all();
        $user = auth()->user();
        // $user = User::all();
        return view('profile', compact('academies', 'skills', 'user'));
    }

    public function update(UsersUpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'biography' => $request->biography,
            'image' => $request->image,
        ]);
        return redirect()->back();
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'biography' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'biography' => $request->biography,
            'registration_step' => 1,
        ]);

        Auth::login($user);
        return redirect()->route('register', ['registration_step' => 2]);
    }
    public function step_two(Request $request)
    {
        $request->validate(
            [
                'academy_id' => ['required'],
            ]
        );
        $user_id = auth()->user()->id;

        User::find($user_id)->update([
            'academy_id' => $request->academy_id,
            'registration_step' => 2,
        ]);
        return redirect()->route('register', ['registration_step' => 3]);
    }
    public function step_three(Request $request)
    {
        $request->validate(
            [
                'skills_ids' => ['required', 'array', 'min:5', 'max:10'],
            ]
        );
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        foreach ($request->skills_ids as $skill_id) {
            $user->skills()->attach($skill_id);
        }

        $user->update([
            'registration_step' => 3,
        ]);

        return redirect()->route('register', ['registration_step' => 4]);
    }
    public function step_four(Request $request)
    {
        $request->validate(
            [
                'image' => ['required', 'image'],
            ]
        );

        $user_id = auth()->user()->id;

        $user = User::find($user_id)->update([
            'image' => $request->image->store('uploads/users/images', 'public'),
            'registration_step' => 4,
        ]);

        event(new Registered($user));
        return redirect(RouteServiceProvider::HOME);
    }
}
