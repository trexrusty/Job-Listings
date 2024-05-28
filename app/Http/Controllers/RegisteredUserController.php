<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $UserAttributes = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'confirmed', Password::min(6)],
        ]);
        $EmployerAttributes = $request->validate([
            'employer' => ['required'],
            'logo' => ['required', 'max:1', File::types(['png', 'jpg', 'svg'])],
        ]);



        $logoPath = $request->logo->store('logos');



        $user = User::create($UserAttributes);

        $user->employer()->create([
            'name' => $EmployerAttributes['employer'],
            'logo' => $logoPath,
        ]);


        Auth::login($user);

        return redirect('/');

    }


}
