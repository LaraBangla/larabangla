@extends('frontend.header_footer')

@section('title')
লারা বাংলা - লগ ইন
@endsection

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 ">
            {{ __('চালিয়ে যাওয়ার আগে, আমরা এইমাত্র আপনাকে ইমেল করেছি সেই লিঙ্কটিতে ক্লিক করে আপনি কি আপনার ইমেল ঠিকানা যাচাই করতে পারেন? আপনি যদি ইমেলটি না পেয়ে থাকেন তবে আমরা আনন্দের সাথে আপনাকে অন্যটি পাঠাব৷।') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('আপনার দেওয়া ইমেল ঠিকানায় একটি নতুন যাচাইকরণ লিঙ্ক পাঠানো হয়েছে৷ অনুগ্রহ করে Spam ফোল্ডারটিও যাচাই করবেন।') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit" class="bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 shadow-md shadow-gray-500/50 text-gray-100">
                        {{ __('পুনরায় যাচাইকরণ ইমেল পাঠান') }}
                    </x-jet-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    {{ __('প্রফাইল সম্পাদনা করুন') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                        {{ __('লগ আউট') }}
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection
