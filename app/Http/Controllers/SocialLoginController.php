<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialLoginController extends Controller
{
    //
    public function handleProviderCallback(Request $request)
    {

        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }

        $socialUser = Socialite::with('facebook')->stateless()->user();
        return $socialUser;
        // $user = User::where('facebook_id', $socialUser->getID())->first();

        // if(!$user)

        //     User::create ([
        //         'facebook_id'   => $socialUser->getID(),
        //         'name'      => $socialUser->getName(),
        //         'email'         => $socialUser->getEmail(), 
        //                 'avatar'        => $socialUser->getAvatar()             
        //     ]);

        // auth()->login($user); 

        // return redirect ('/dashboard');
    }

}
