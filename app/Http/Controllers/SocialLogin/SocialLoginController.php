<?php

namespace App\Http\Controllers\SocialLogin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    //social auth code goes below
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    function callback($provider)
    {

        $authUser = Socialite::driver($provider)->user();
        $findUser = User::where('email', $authUser->email)->orWhere('provider_id', $authUser->id)->first();

        if ($findUser != null)
        {
            Auth::login($findUser);
            return redirect()->route('/');
        }
        else
        {
            $spaceRemoveName = strtolower(str_replace(' ', '', $authUser->name)); // remove string spaces

            $username = null;
            $find_username = User::whereUsername($spaceRemoveName)->first();
            if ($find_username != null || !empty($find_username))
            {
                while ($find_username != null || !empty($find_username))
                {
                    $num = 1;
                    $find_username = User::whereUsername($spaceRemoveName . $num)->first();
                    $username = $spaceRemoveName . $num;
                    $num++;
                    if ($find_username == null || empty($find_username))
                    {
                        break;
                    }
                }
            }
            else
            {
                $username = $spaceRemoveName;
            }

            $password = rand(111111, 999999) . Str::random(5);
            $user = User::create([
                'name'     => $authUser->name,
                'email'    => $authUser->email,
                'phone'    => null,
                'username'    => $username,
                'provider' => $provider,
                'provider_id' => $authUser->id,
                'provider_profile_pic' => $authUser->avatar,
                'password' => Hash::make($password),
                'email_verified_at' => Carbon::now()->toDateTimeString()
            ]);

            Auth::login($user);
            return redirect()->route('/');
        }
    }
}
