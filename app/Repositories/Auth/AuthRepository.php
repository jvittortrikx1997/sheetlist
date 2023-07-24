<?php

namespace App\Repositories\Auth;

use App\Models\Auth\User;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::where('email', $data['email'])
            ->orWhere('username', $data['username'])
            ->first();

        if(!is_null($user)) {
            throw new \Exception('Usuário já existe', 400);
        }

        return User::create($data);
    }

}
