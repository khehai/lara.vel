<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;
use FFI\Exception;

class GithubSocialController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('github')->stateless()->user();
            $finduser = User::where('social_id', $user->id)->first();

            if($finduser){
                Auth::login($finduser);
                return redirect('/dashboard');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type'=>'github',
                    'password'=>encrypt('my-gitpassword')
                ]);
                $newUser->markEmailAsVerified();
                Auth::login($newUser);
                return redirect('/dashboard');
            }
        }catch(Exception $e){
            dd($e->getMessage());
        }

    }
}
