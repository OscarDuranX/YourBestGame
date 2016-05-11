<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\OAuthIdentity;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SocialAuthController extends Controller
{


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/' . $provider);
        }
//        dd($user);
        $authUser = $this->findOrCreateUser($user , $provider);
        Auth::login($authUser, true);
        return Redirect::to('home');
    }

    private function findOrCreateUser($providerUser, $provider)
    {
        if ($authUser = $this->userExistsByProviderUserId($providerUser))
            return $authUser;
        return $this->createUser($providerUser, $provider);
    }

    private function userExistsByProviderUserId($providerUser)
    {
        /** @var OAuthIdentity $provUser */
        if ( $provUser = OAuthIdentity::where('provider_user_id', $providerUser->id)->first()) {
            return $provUser->user;
        }
        return false;
    }

    private function createUser($providerUser, $provider)
    {
        if (! $user = $this->userExistsByEmail($providerUser))
        {
            $user = $this->newUser();
            foreach (['name','email'] as $item) {
                $user->$item = $providerUser->$item;
            }
            $user->save();
        }
        $oAuthIdentity = new OAuthIdentity();
        $oAuthIdentity->provider_user_id = $providerUser->getId();
        $oAuthIdentity->provider = $provider;
        $oAuthIdentity->access_token = $providerUser->token;
        $oAuthIdentity->user_id = $user->id;
        $oAuthIdentity->name = $providerUser->getName();
        $oAuthIdentity->save();
        return $user;
    }

    private function newUser()
    {
        $user_model = Config::get('socialite.model');
        return new $user_model;
    }

    private function userExistsByEmail($providerUser)
    {
        if ( $user = User::where('email', $providerUser->email)->first()) {
            return $user;
        }
        return false;
    }


}
