<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        // Validate the data types of the credentials.
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        // Search for the user in the database.
        $user = User::where('email', $credentials['email'])->first();

        // Check if the user exists and the password is correct.
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'invalid credentials'], 401);
        }

        try {
            // Create the token with custom payload.
            $token = JWTAuth::fromUser($user, [
                'id' => $user->id,
                'email' => $user->email,
            ]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        // Return the token.
        return response()->json(compact('token'));
    }
}
