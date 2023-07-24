<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\AuthRepository;
use App\Utils\ExceptionReturn;
use App\Utils\ValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $validated = ValidateRequest::validateRequest($request, [
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'username' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'email'],
                'password' => ['required', 'string', 'min:8', 'max:255'],
            ]);

            $auth = $this->authRepository->register($validated);
        } catch (\Exception $e) {
            return ExceptionReturn::exceptionReturn($e);
        }

        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'data' => [
                $auth
            ]
        ], 201);

    }

}
