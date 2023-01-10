@extends('frontend.header_footer')

@section('title')
লারা বাংলা - পাসওয়ার্ড ভুলে গেছেন
@endsection

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-xs leading-5 text-gray-600">
            {{ __('আপনি কি পাসওয়ার্ড ভুলে গেছেন? সমস্যা নেই. শুধু আমাদের আপনার ইমেল ঠিকানা জানান এবং আমরা আপনাকে একটি পাসওয়ার্ড রিসেট লিঙ্ক ইমেল করব যা আপনাকে একটি নতুন চয়ন করার অনুমতি দেবে৷।') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                 <x-jet-label for="email" value="{{ __('ইমেইল') }}" />
                {{-- <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> --}}

                <div class="flex">
                    <x-jet-input type="email"  id="email" name="email" :value="old('email')" required autofocus class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                </div>
                    @error('email')
                    <span class=" text-red-500 font-normal text-sm" role="alert">
                       {{ $message }}
                    </span>
                    @enderror
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 shadow-md shadow-gray-500/50">
                    {{ __('পাসওয়ার্ড রিসেট লিংক পান') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection

@push('scripts')
@include('frontend.more.planetaryjsFile')
@endpush