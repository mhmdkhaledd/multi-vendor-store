<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'device_name' => ['nullable'],
            'scopes' => ['sometimes', 'string']
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $device_name = $request->post('device_name', $request->userAgent());

            $token = $user->createToken($device_name);

            return Response::json([
                'token' => $token->plainTextToken,
                'user' => $user,
            ], 201);

        }

        // 401
        return Response::json([
            'message' => __('Invalid credentials!')
        ], 401);
    }

    public function destroy($token = null)
    {
        $user = Auth::guard('sanctum')->user();

        if (null == $token) {
            if ($token == 'all') {
                $user->currentAccessToken()->delete();
                return;
            }

            $PersonalAccessToken = PersonalAccessToken::findToken($token);

            if ($user->id == $PersonalAccessToken ->tokenable_type
                && get_class($user) == $PersonalAccessToken->tokenable_type)
                {
                $PersonalAccessToken->delete();
                }
        }
    }
}
