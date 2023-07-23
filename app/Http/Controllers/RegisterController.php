<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = $this->userService->createUser($request->all());

        dd($user); 
        if (is_array($user)) {
            return redirect()->route('register')->withErrors($user)->withInput();
        }

        return redirect()->route('login')->with('success', 'Registration successful! You can now login.');
    }
}
