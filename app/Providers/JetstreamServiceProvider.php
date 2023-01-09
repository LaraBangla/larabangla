<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;


class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // ignore default routes;
        Jetstream::ignoreRoutes();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        // custom login system start
        Fortify::authenticateUsing(function (Request $request)
        {



            $request->validate(
                [
                    'email' => 'required | max:255',
                    'password' => 'required | min:8',
                    'g-recaptcha-response' => 'required | captcha'
                ],
                [
                    'email.required' => 'ইমেইল বা ব্যাবহারকারী নাম ক্ষেত্রটি পূরণ করতে হবে', // Failed message on -> larabangla\lang\en\auth.php
                    'email.max' => 'ইমেইল বা ব্যাবহারকারী নাম ২৫৫ অক্ষরের বেশি হওয়া উচিত নয়।',
                    'password.required' => 'পাসওয়ার্ড ক্ষেত্রটি পূরণ করতে হবে।',
                    'password.min' => 'পাসওয়ার্ড সর্বনিম্ন ৮ অক্ষরের হতে হবে।',
                    'g-recaptcha-response.required' => 'অনুগ্রহ করে যাচাই করুন যে আপনি রোবট নন।',
                    'g-recaptcha-response.captcha' => 'ক্যাপচা ত্রুটি! পরে আবার চেষ্টা করুন বা সাইট অ্যাডমিনের সাথে যোগাযোগ করুন।'
                ]
            );

            $user = User::where('email', $request->email)
                ->orWhere('username', $request->email)
                ->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            )
            {
                return $user;
            }
        });

        // custom login system start end


        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('admin', 'Administrator', [
            'create',
            'read',
            'update',
            'delete',
        ])->description('Administrator users can perform any action.');

        Jetstream::role('editor', 'Editor', [
            'read',
            'create',
            'update',
        ])->description('Editor users have the ability to read, create, and update.');
    }
}
