<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthApiController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = $this->authService->registerUser($validated_data);

        return response()->json([
            'user' => $user,
        ], 201);
    }

    public function login (Request $request)
    {
        $data = $request->validate([
            'password' => 'required|string',
            'phone' => 'required|string'
        ]);

        $result = $this->authService->loginUser($data['phone'], $data['password']);

        return response()->json(['token' => $result['token']]);

    }
}
