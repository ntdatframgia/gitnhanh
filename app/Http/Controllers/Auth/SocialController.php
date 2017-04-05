<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Social;
use App\User;
use Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class SocialController extends Controller
{
    
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();        
        $check = Social::where('provider_user_id',$user->id)->where('provider','facebook')->first();        
        if(!$check)
        {
            $socials =  new Social;
            $socials->provider_user_id = $user->id;
            $socials->provider = 'facebook';            

            $u = User::where('email',$user->email)->first();
            if(!$u)
            {
               $u = User::create(
                [
                    'email' => $user->email,
                    'username' => $user->id,
                    'avatar' => $user->avatar,
                    'fname' => $user->name,
                ]);
            }
            $socials->user_id = $u->id;
            $socials->save();
            Auth::login($u);
            return redirect('/home');
        }else
        {
          $u = User::where('email',$user->email)->first();
          Auth::login($u);
          return redirect('/home');  
        }
        
    }

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();        
        $check = Social::where('provider_user_id',$user->id)->where('provider','google')->first();  
              
        if(!$check)
        {
            $socials =  new Social;
            $socials->provider_user_id = $user->id;
            $socials->provider = 'google';            

            $u = User::where('email',$user->email)->first();
            if(!$u)
            {
               $u = User::create(
                [
                    'email' => $user->email,
                    'username' => $user->id,
                    'avatar' => $user->avatar,
                    'fname' => $user->name,
                ]);
            }
            $socials->user_id = $u->id;
            $socials->save();
            Auth::login($u);
            return redirect('/home');
        }else
        {
          $u = User::where('email',$user->email)->first();
          Auth::login($u);
          return redirect('/home');  
        }
        
    }
}
