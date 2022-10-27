@extends('frontend.header_footer')
@section('content')

<div>
    <div>
        <div>
            <div class="  pt-20 lg:pt-32 duration-700" :class="open ? 'blur-sm' : ''">
                <h1 class=" text-center font-black text-4xl md:text-6xl lg:text-7xl"><span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-gray-500  to-gray-400 ">লারা</span>
                    <span
                        class=" text-5xl md:text-7xl lg:text-8xl text-transparent bg-clip-text bg-gradient-to-r from-gray-500  to-gray-400">বাংলা</span>
                </h1>
                <h2
                    class=" pb-10 text-center font-black text-4xl md:text-6xl lg:text-7xl sm:text-4xl pt-6 text-gray-500">
                    এবার শিখা হোক বাংলায়</h2>
                <h3 class="text-center font-semibold text-xl text-gray-500 px-5">সাধারণ, অতি সাধারণ। সাধারণ, অতি সাধারণ।
                    সাধারণ, অতি সাধারণ</h3>
                <div class="flex justify-center mt-14">
                    <div class="m-2"><a href="#"
                            class="btn-lg rounded-full bg-gray-500 text-white hover:bg-gray-600  hover:ring-blue-200">লারাভেল
                            ডক</a></div>
                    <div class="m-2"><a href="#"
                            class="btn-lg rounded-full px-16 bg-gray-500 text-white hover:bg-gray-600  hover:ring-blue-200">ব্লগ</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- home content section -->
    <section class="lg:px-6 md:px-10 mt-20 mb-20 md:mb-0 duration-700" :class="open ? 'blur-sm' : ''">
        <div class="grid grid-cols-12 gap-3 md:gap-10  p-3">

            @for($i = 1; $i<=8; $i++)
                <div class=" col-span-6 mt-3 md:mt-0 md:col-span-6 lg:col-span-3 ">
                    <a href="#">
                        <div
                            class="block md:flex bg-gray-300 shadow-xl duration-300 hover:shadow-2xl md:border-l-8 md:border-stone-500">
                            <div class=" h-32 md:h-40">
                                <img src="{{ asset('assets/img/laravel.png') }}" alt="Technology"
                                    class=" pr-0 md:pr-5 w-full  h-32 md:h-40">

                            </div>
                            <div class="pt-4">
                                <h5 class=" font-black text-2xl pl-2 md:pl-0">লারাভেল</h5>
                                <div
                                    class="mt-2 md:mt-4 pb-3 md:pb-0 font-medium md:font-medium text-md md:text-2xl pl-2 md:pl-0">
                                    <p>লারাভেল পিএইচপি ফ্রেমওয়ার্ক</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </section>
    <!-- home content section end -->
</div>

@endsection
