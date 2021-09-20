<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreUserRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        // take the validated data from StoreUserRequest
        $validatedData = $request->validated();

        // hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // create an user and log it
        User::create($validatedData);
        Log::channel('userRegistered')->info('A new user has registered', ['username' => $validatedData['username']]);

        // redirect with flash message
        return redirect('/login')->with('alert', [
            'type' => 'success',
            'message' => 'Registration successful! Please login.'
        ]);
    }
}
