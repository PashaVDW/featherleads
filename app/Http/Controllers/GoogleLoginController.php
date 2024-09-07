<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->email)->first();

        if (! $user) {
            $randomPass = sha1(Str::random());
            $user = (new CreateNewUser)->create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => $randomPass,
                'password_confirmation' => $randomPass,
            ]);
        }

        Auth::login($user, true);

        return app(LoginResponse::class)->toResponse(request());
    }
}
