<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make(
            $input,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'unique:users'],
                'username' => ['required', 'string', 'max:100', 'unique:users'],
                'mobile' => ['nullable', 'string', 'regex:/(01)[0-9]{9}/', 'size:11'],
                'password' => $this->passwordRules(),
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
                'g-recaptcha-response' => ['required|captcha']
            ],
            [
                'name.required' => 'নাম ক্ষেত্রটি পূরণ করতে হবে।',
                'name.max' => 'নাম ৫০ অক্ষরের বেশি হওয়া উচিত নয়।',
                'email.required' => 'ইমেইল ক্ষেত্রটি পূরণ করতে হবে।',
                'email.max' => 'ইমেইল ২৫৫ অক্ষরের বেশি হওয়া উচিত নয়।',
                'email.unique' => 'এই ইমেইল ইতিমধ্যে অন্য একাউন্টে ব্যাবহার করা হয়েছে।',
                'mobile.regex' => 'অনুগ্রহ করে আপনার ১১ ডিজিটের মোবাইল নাম্বার প্রবেশ করান',
                'mobile.size' => 'মোবাইল নাম্বার সর্বচ্চ ১১ ডিজিটের বেশি হবে না।',
                'username.required' => 'ব্যাবহারকারী নাম ক্ষেত্রটি পূরণ করতে হ।',
                'username.max' => 'ব্যাবহারকারী নাম ২৫৫ অক্ষরের বেশি হওয়া উচিত নয়।',
                'username.unique' => 'এই ব্যাবহারকারী নাম ইতিমধ্যে অন্য একাউন্টে ব্যাবহার করা হয়েছে।',
                'password.required' => 'পাসওয়ার্ড ক্ষেত্রটি পূরণ করতে হবে।',
                'password.confirmed' => 'পাসওয়ার্ড এবং নিশ্চিত করন পাসওয়ার্ড মিলেনি।',
                'terms.accepted' => 'ক্ষেত্রটি গ্রহণ করতে হবে।',
                'terms.required' => 'ক্ষেত্রটি পূরণ করতে হবে।',
                'g-recaptcha-response.required' => 'অনুগ্রহ করে যাচাই করুন যে আপনি রোবট নন।',
                'g-recaptcha-response.captcha' => 'ক্যাপচা ত্রুটি! পরে আবার চেষ্টা করুন বা সাইট অ্যাডমিনের সাথে যোগাযোগ করুন।'
            ]
        )->validate();

        return DB::transaction(function () use ($input)
        {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $input['username'],
                'mobile' => $input['mobile'],
                'password' => Hash::make($input['password']),
            ]), function (User $user)
            {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
