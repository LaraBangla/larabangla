<?php

namespace App\Http\Controllers\SocialLogin;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\DefaultMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            // login if user is already exist
            Auth::login($findUser);
            return redirect()->route('/');
        }
        else
        {
            // remove space for Name 
            $spaceRemoveName = strtolower(str_replace(' ', '', $authUser->name)); // remove string spaces
            // generate username
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

            // generate random string password
            $password = Str::random(10);
            // create new user
            $user = User::create([
                'name'     => $authUser->name,
                'email'    => $authUser->email,
                'phone'    => null,
                'username'    => $username,
                'provider' => $provider,
                'provider_id' => $authUser->id,
                'provider_profile_pic' => $authUser->avatar,
                'password' => Hash::make($password),
            ]);

            // check email null or not | if email exist then do not do auto verify. else do auto verify
            $isNullEmail = null;
            if ($authUser->email == null)
            {
                $isNullEmail = now();
            }
            $user->forceFill([
                'email_verified_at' => $isNullEmail
            ])->save();

            // login this user
            Auth::login($user);

            // send mail with credentials if email exists
            if ($authUser->email != null)
            {
                $type = "জরুরী";
                $subject = "লগিন শংসাপত্র";
                $body = "আপনার লগিন শংসাপত্র গুলো হলোঃ ইমেইলঃ " . $authUser->email . " পাসওয়ার্ডঃ " . $password . " অনুগ্রহ করে পরবর্তী লগ ইন এর সময় উক্ত শংসাপত্র গুলো ব্যাবহার করবেন।";
                $link = null;
                $button_title = null;
                Mail::to($authUser->email)->send(new DefaultMail($type, $subject, $body, $link, $button_title));
                $user->sendEmailVerificationNotification();
            }


            return redirect()->route('/');
        }
    }
}
