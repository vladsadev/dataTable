<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $validatedEmployer = $request->validate([
            'employer' => ['required'],
            'logo' => ['required', File::types(['jpg', 'png', 'webp'])],
        ]);

        //create the new user
        $user = User::create($validatedUser);

        //Realizamos el tratamiento de la imagen:
        // 1. la ubicamos en la ruta deseada, para este ej en el folder 'logos' de 'storage/app/public/logos'
        $logoPath = $request->logo->store('logos');


        $user->employer()->create([
            'name' => $validatedEmployer['employer'],
            'logo' => $logoPath
        ]);

        //Auth the user
        \Auth::login($user);

        return redirect('/');


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

}
