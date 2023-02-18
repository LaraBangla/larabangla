{{-- <x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout> --}}


@extends('frontend.header_footer')
@section('title')
গোপনীয়তা নীতি - লারা বাংলা
@endsection
@section('content')
<section>
    <div class="container mx-auto md:pb-20 md:pt-10 py-5 ">
       <div class="mx-3 md:mx-16 lg:mx-40 border rounded px-5 md:px-10 leading-8 py-10 shadow-md">
        <div>
        </div>
            <div class=" content text-justify">
                {!! $policy !!}
            </div>
       </div>
    </div>
</section>
@endsection
