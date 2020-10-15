<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function create()
    {
        $schools = School::query()->orderBy('name', 'ASC')->pluck('name', 'id');

        return view('cms.user.create', compact('schools'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'school_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        User::create($attributes);

        return redirect()->route('user.create');
    }

    public function reset()
    {
        return view('cms.user.password-reset');
    }


    public function update()
    {
        $attributes = request()->validate([
            'password' => 'required|confirmed',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->update(['password' => Hash::make($attributes['password'])]);

        return redirect()->back()->with('message', 'Şifreniz başarıyla güncellendi');
    }
}
