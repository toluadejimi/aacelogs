<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use App\Models\TarrifState;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Laravel\Sanctum\PersonalAccessToken;

class Authcontroller extends Controller
{
    public static function get_token(request $request)
    {

        $credentials = request(['email', 'password']);
        $usr = User::where('email', $request->email)->first() ?? null;
        $status = User::where('email', $request->email)->first()->status ?? null;

        Passport::tokensExpireIn(Carbon::now()->addMinutes(20));
        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(20));

        if (!auth()->attempt($credentials)) {
            $message = "Email or Password Incorrect";
            return response()->json([
                'status' => false,
                'message' => $message
            ]);
        }

        $user = user();
        if ($user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
        }

        $user->tokens()->delete();

        $get_token = $user->createToken('API Token')->plainTextToken;
        $user['token'] = $get_token;

        return response()->json([
            'status' => true,
            'data' => $user
        ]);


    }
}
