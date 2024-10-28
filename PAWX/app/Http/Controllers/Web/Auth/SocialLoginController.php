<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Nette\Utils\Random;

//class SocialLoginController extends Controller
//{
//    public function redirect($provider)
//    {
//        return Socialite::driver($provider)->redirect();
//    }
//
//    public function callback($provider)
//    {
//        $user = Socialite::driver($provider)->user();
//        $existingUser = User::where('email', $user->email)->first();
//
//        if ($existingUser) {
//            Auth::login($existingUser);
//        } else {
//            $newUser = new User();
//            $newUser->name = $user->name;
//            $newUser->email = $user->email;
//
//            // Optional: redirect to a password setting page if they are a new user
//            // You might set a flag or a session variable to indicate they need to set a password
//
//            $newUser->password = Hash::make(Str::random(8)); // Temporary password
//            $newUser->save();
//
//            $newUser->client()->create();
//            Auth::login($newUser);
//
//            // Redirect to a page to set their own password
//            //return redirect()->route('set-password'); // Example route to set password
//        }
//
//        return view('dashboard');
//    }
//}



class SocialLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if(!$user)
        {
            $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => Hash::make(rand(100000,999999))]);
        }
        Auth::login($user);
        return redirect('dashboard');
    }
}
