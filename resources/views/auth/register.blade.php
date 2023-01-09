@extends('frontend.header_footer')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <div class="mb-5">
            <div class="text-center">
                <h1 class=" text-2xl font-semibold">রেজিস্টার</h1>
            </div>
            <div class=" w-28 bg-slate-200 mx-auto" style=" height:2px;"></div>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('পূর্ণ নাম') }}" />
                
                {{-- <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> --}}

                <div class="flex">
                    <x-jet-input type="text"  id="name" name="name" :value="old('name')" required autofocus class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    </div>
                    @error('name')
                    <span class=" text-red-500 font-normal text-sm" role="alert">
                       {{ $message }}
                    </span>
                    @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('ইমেইল') }}" />
                {{-- <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required /> --}}
                <div class="flex">
                    <x-jet-input type="email"  id="email" name="email" :value="old('email')" required autofocus class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
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

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('ব্যাবহারকারী নাম ( ইউজারনেম )') }}" />
                {{-- <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required /> --}}
                <div class="flex">
                    <x-jet-input type="text"  id="username" name="username" :value="old('username')" required autofocus class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa-solid fa-user"></i>
                    </span>
                </div>
                    @error('username')
                    <span class=" text-red-500 font-normal text-sm" role="alert">
                       {{ $message }}
                    </span>
                    @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="mobile" value="{{ __('মোবাইল') }}" />
                {{-- <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required /> --}}
                <div class="flex">
                    <x-jet-input type="text"  id="mobile" name="mobile" :value="old('mobile')" required autofocus class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa-solid fa-mobile-screen"></i>
                    </span>
                </div>
                @error('mobile')
                    <span class=" text-red-500 font-normal text-sm" role="alert">
                       {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4">
                {{-- <x-jet-label for="password" value="{{ __('পাসওয়ার্ড') }}" /> --}}
                {{-- <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" /> --}}
                <div class="mt-4">
                    <x-jet-label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" value="{{ __('পাসওয়ার্ড') }}" />
                    <div class="flex">
                    <x-jet-input type="password" id="password" name="password" required autocomplete="new-password" class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                {{-- <x-jet-label for="password_confirmation" value="{{ __('নিশ্চিত করন পাসওয়ার্ড') }}" /> --}}
                {{-- <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" /> --}}
                <div class="mt-4">
                    <x-jet-label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" value="{{ __('নিশ্চিত করন পাসওয়ার্ড') }}" />
                    <div class="flex">
                    <x-jet-input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="rounded-none rounded-l-lg bg-gray-50 border text-gray-900 focus:ring-0 focus:border-gray-200 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <span class="inline-flex items-center px-4 text-sm text-gray-900 bg-gray-200 border border-l-0 border-gray-300 rounded-r-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">

                    <div class="mt-5 mb-3">
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in ">
                            <input type="checkbox" name="toggle" id="show-pass" onclick="showpass()" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer "/>
                            <label for="show-pass" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer "></label>
                        </div>
                        <label for="show-pass" class="text-sm text-gray-700">পাসওয়ার্ড দেখুন</label>
                    </div>

                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('আমি :terms_of_service এবং :privacy_policy সম্মত', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('পরিষেবার শর্তাবলী').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('গোপনীয়তা নীতিতে').'</a>',
                                       
                                ] ) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('ইতিমধ্যে রেজিস্টার করেছেন?') }}
                </a> --}}

                {{-- <x-jet-button class="ml-4">
                    {{ __('রেজিস্টার') }}
                </x-jet-button> --}}

            
            </div>

            <div class="mt-5 -ml-4 sm:ml-0">
                <div>
                    {!! NoCaptcha::renderJs('bn', false, 'onloadCallback') !!}
                    {!! NoCaptcha::display() !!}
               </div>
               @error('g-recaptcha-response')
               <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
             @enderror
              </div>

            <x-jet-button class="mt-5 w-full py-3 bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 shadow-md shadow-gray-500/50 ">
                {{ __('রেজিস্টার') }}
            </x-jet-button>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection

@push('scripts')
<script type="text/javascript">
    function showpass()
    {
    var x = document.getElementById("password");
    var y = document.getElementById("password_confirmation");
    var check = document.getElementById("show-pass");
        if(check.checked == true)
        {
        x.type = "text";
        y.type = "text";
        }
        else
        {
        x.type = "password";
        y.type = "password";
        }
    }


    </script>

    <script type='text/javascript' src="https://d3js.org/d3.v3.min.js"></script>
    <script type='text/javascript' src="https://d3js.org/topojson.v1.min.js"></script>
    <script type='text/javascript' src="{{asset('js/planetaryjs.js')}}"></script>
    <script type='text/javascript' src="{{asset('js/planetaryjs_custom.js')}}"></script>

@endpush