<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "data" => ["errors" => $validator->invalid()]
            ], 442);
        }

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provide credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken("tokenusername")->plainTextToken;

        return response()->json([
            "data" => [
                "token" => $token
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus sesuai.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return response()->json(['message' => 'Register berhasil'], 201);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout berhasil']);
    }
}
