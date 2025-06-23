<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        protected UserRepository $userRepository
    ) {}

    public function registerUser(array $data): User
    {
        return $this->userRepository->createUser($data);
    }

    public function loginUser(string $phone, string $password){
        $user = $this->userRepository->findByPhone($phone);

        if(!$user || !Hash::check($password, $user->password)){
            return ['error' => 'Невірний пароль або телефон'];
        }
        if (!$user->two_factor_enabled) {
            $token = $this->generateToken($user);
            return ['token' => $token];
        }
    }

    public function send2FACode(string $phone): ?string
    {
        $user = $this->userRepository->findByPhone($phone);

        if (!$user) {
            return null;
        }

        $code = sprintf("%06d", mt_rand(0, 999999));
        $user->two_factor_code = $code;
        $user->two_factor_expires_at = now()->addMinutes(5);
        $user->save();

        return $code;
    }

    public function verify2FACode(string $phone, string $code): false|string|null
    {
        $user = $this->userRepository->findByPhone($phone);

        if (!$user) {
            return null;
        }

        if ($user->two_factor_code !== $code) {
            return false;
        }

        if (!$user->two_factor_expires_at || $user->two_factor_expires_at->isPast()) {
            return false;
        }

        $user->two_factor_code = null;
        $user->two_factor_expires_at = null;
        $user->save();


        return $this->generateToken($user);
    }

    public function generateToken(User $user): string
    {
        return $user->createToken('mobile')->plainTextToken;
    }
}
