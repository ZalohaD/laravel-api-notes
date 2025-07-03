<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ){}

    public function login(Request $request){

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $result = $this->authService->loginUser($request->email, $request->password);

        if (isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }


        auth()->loginUsingId($result['user_id']);
        return redirect()->intended('/dashboard');
    }

    public function register(Request $request)
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.index');
        }

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);

        $result = $this->authService->registerUser($data);
        auth()->loginUsingId($result['user_id']);

        return redirect()->intended('/dashboard');
    }


    public function showLoginForm()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            return redirect()->route('dashboard.index');
        }
        if (auth()->user()->role === 'admin'){
            return redirect()->route('dashboard.admin');
        }

        return view('auth.login');
    }

    public function showRegisterForm()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            return redirect()->route('dashboard.index');
        }
        if (auth()->user()->role === 'admin'){
            return redirect()->route('dashboard.admin');
        }

        return view('auth.register');
    }

}
