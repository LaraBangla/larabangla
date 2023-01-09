@extends('frontend.header_footer')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        {{-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> --}}

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

            <div class="mb-5">
                <div class="text-center">
                    <h1 class=" text-2xl font-semibold">লগ ইন</h1>
                </div>
                <div class="w-20 bg-slate-200 mx-auto" style=" height:2px;"></div>
            </div>

       

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-jet-label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" value="{{ __('ইমেইল অথবা ব্যবহারকারী নাম') }}" />
                <div class="flex">
                <x-jet-input type="text"  id="email" name="email" :value="old('email')" required autofocus class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <i class="fa-solid fa-user"></i>
                </span>
                </div>
                @error('email')
                <span class=" text-red-500 font-normal text-sm" role="alert">
                   {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mt-4">
            <x-jet-label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" value="{{ __('পাসওয়ার্ড') }}" />
            <div class="flex">
            <x-jet-input type="password" id="password" name="password" required autocomplete="current-password" class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                <i class="fa-solid fa-lock"></i>
            </span>
            </div>
            @error('password')
            <span class=" text-red-500 font-normal text-sm" role="alert">
                {{ $message }}
             </span>
            @enderror
            </div>


        <div class="flex justify-between">
            <div class="mt-5">
                <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in ">
                    <input type="checkbox" name="toggle" id="toggle" onclick="showpass()" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer "/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer "></label>
                </div>
                <label for="toggle" class="text-xs text-gray-700">পাসওয়ার্ড দেখুন</label>
            </div>
    
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-xs text-gray-600 hover:text-gray-900 " href="{{ route('password.request') }}">
                        {{ __('পাসওয়ার্ড ভুলে গেছেন?') }}
                    </a>
                @endif
            </div>
        </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('আমাকে মনে রাখুন') }}</span>
                </label>
            </div>

            <div class="mt-8 -ml-4 sm:ml-0">
                <div>
                    {!! NoCaptcha::renderJs('bn', false, 'onloadCallback') !!}
                    {!! NoCaptcha::display() !!}
               </div>
               @error('g-recaptcha-response')
               <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
             @enderror
              </div>

          <div>
            <x-jet-button class="mt-5 w-full py-3 bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 shadow-md shadow-gray-500/50 ">
                {{ __('লগ ইন') }}
            </x-jet-button>
            
          </div>

          
          
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection



@push('scripts')
<script type="text/javascript">
    function showpass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    }
    </script>
@include('frontend.more.planetaryjsFile')
@endpush


