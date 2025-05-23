@extends('frontend.header_footer', [
    'slot' => null,
])
@section('content')
  <div class="homeWrapper">
    <div>
      <div>
        <div class="pt-20 duration-700 lg:pt-32">
          <h1 class="text-center text-4xl font-black md:text-6xl lg:text-7xl"><span
                  class="bg-gradient-to-r from-blue-500 to-amber-400 bg-clip-text text-transparent">লারা</span> <span
                  class="bg-gradient-to-r from-red-500 to-green-400 bg-clip-text text-5xl text-transparent md:text-7xl lg:text-8xl">বাংলা</span></h1>
          <h2 class="pb-10 pt-6 text-center font-black text-4xl sm:text-4xl md:text-6xl lg:text-7xl">
            <span class="bg-gradient-to-r from-blue-500  via-red-400 to-green-500 bg-clip-text  text-transparent">এবার বাংলায় শিখা হোক</span> </h2>
          <h3 class="px-5 text-center text-md md:text-xl font-semibold text-green-500">ফ্রি অনলাইন বাংলা টিউটোরিয়াল ওয়েব সাইট
             {{-- <span id="LaraBanglaType"></span> --}}
             </h3>
          <div class="mt-14 flex justify-center">
            <div class="m-2"><a href="{{route('tutorials')}}" class="btn-lg rounded-full text-white  bg-green-600  hover:bg-green-700  hover:ring-amber-400 ">টিউটোরিয়াল</a>
            </div>
            <div class="m-2">
                <a class="btn-lg rounded-full bg-green-600 px-14 sm:px-16 text-white hover:bg-green-700 hover:ring-amber-400 "
                href="{{route('blog')}}">ব্লগ</a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- home content section -->

    {{-- @include('frontend.more.technologies') --}}

    {{-- <div class="bg-gradient-to-b from-white to-gray-900 h-52"></div> --}}

    <section class=" mt-10 container mx-auto " >
        {{-- newsletter --}}
      {{-- <div class="grid grid-cols-12 p-3  sm:mx-28 md:mx-32 lg:mx-72 xl:mx-96 mb-24 mt-14 md:mt-24">
        <div class="col-span-12 mt-3 ">
          <form>
            <label for="subscribe" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
               <span class="w-5 h-5 text-gray-500 animate-bounce"><i class="fa-regular fa-bell"></i></span>
                  </div>
                <input type="email" id="subscribe" class="block w-full p-4 pl-10 text-sm text-gray-400 border border-gray-700 rounded-lg bg-slate-900  focus:border-1 focus:ring-0 focus:border-gray-700 " placeholder="আপডেট নিউজ ই-মেইলে পেতে সাবস্ক্রাইব করুন" required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-700 focus:outline-none focus:ring-0 font-medium rounded-lg text-sm px-4 py-2 ">সাবস্ক্রাইব</button>
            </div>
        </form>
      </div>
      </div> --}}

 {{-- /newsletter --}}


      <div>
          <div class="md:flex block md:justify-around 2xl:-ml-5 xl:-ml-10 lg:-ml-16 mx-10 md:mx-0 mt-40">
            <div class="mx-auto md:mx-0">
             <div class="  md:mr-5 md:float-left h-full lg:block md:hidden" style="width: 3px; background: linear-gradient(#d2a8ff, #a371f7 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" md:float-right py-16 ">
               <p class="  font-black text-xl sm:text-3xl text-green-500">আপনি কি শিক্ষানবিস?</p>
               <p class=" mt-4 text-gray-400 text-lg"> নতুন টেকনলজি শিখতে চাচ্ছেন? লারা বাংলা আপনার সাথেই আছে।</p>
             </div>
            </div>
            <div class=" md:w-1/3 sm:w-full  py-16 -mt-24 md:mt-0">
      <div class="code-toolbar"><pre class="language-php" tabindex="0"><code class="language-php">composer <span class="token keyword">global</span> <span class="token keyword">require</span> laravel<span class="token operator">/</span>installer
laravel <span class="token keyword">new</span> <span class="token class-name">example</span><span class="token operator">-</span>app</code></pre><div class="toolbar"><div class="toolbar-item"><button class="copy-to-clipboard-button" type="button" data-copy-state="copy"><span>Copy</span></button></div></div></div>
            </div>
          </div>




      <div class="-mt-14 md:mt-0 md:-ml-8 ">
        <div>
          <div class="md:flex  md:justify-around ">

            <div class=" md:mb-10 mt-5 ">
              <div class="lg:block hidden">
                <div class="-ml-3 text-xl text-white" >
                  <span ><i class="fa-solid fa-layer-group mt-10 mb-5" ></i></span>
                </div>
              </div>

             <div class="mr-5 md:float-left h-full lg:block hidden" style="width: 3px; background: linear-gradient(#d2a8ff, #a371f7 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" md:float-right py-16 ">
              <img src="{{ asset('img/css.png') }}" class="block mx-auto md:mx-0 w-full md:w-auto" style="max-height: 700px;" alt="Code">
             </div>
            </div>

            <div class=" pb-16 md:pt-4 flex justify-center items-center mx-12 md:mx-0">
             <div class=" max-w-md">
              <p class="  font-black text-xl sm:text-3xl text-green-500 ">ওয়েব ডিজাইনে আগ্রহী?</p>
              <p class=" text-gray-400 mt-4 leading-8">আপনি যদি ওয়েব ডিজাইন শিখতে আগ্রহী হন, আপনি সঠিক জায়গায় এসেছেন। এখানে আপনি বিভিন্ন রিসোর্স এবং টিউটোরিয়াল পাবেন যা আপনাকে ওয়েব ডিজাইনের উত্তেজনাপূর্ণ ক্ষেত্রে শুরু করতে সাহায্য করবে। আপনি প্রাথমিক বিষয়গুলি শিখছেন এমন একজন শিক্ষানবিস বা একজন অভিজ্ঞ ডিজাইনার যা আপনার দক্ষতা বাড়াতে চান?, আমাদের সবার জন্য কিছু না কিছু আছে৷ তাই এক কাপ কফি নিন, আরাম করুন, এবং আসুন একসাথে শেখা শুরু করি!</p>

            </div>
            </div>
          </div>
        </div>
      </div>

      <div class=" 2xl:-ml-6  lg:-ml-16">
        <div>
          <div class="md:flex md:justify-around ">
            <div class=" md:mb-10 mt-5">
              <div class="lg:block hidden">
                <div class="-ml-3 text-xl text-white" >
                  <span ><i class="fa-solid fa-layer-group mt-10 mb-5" ></i></span>
                </div>
              </div>
             <div class=" md:float-left h-full lg:block hidden" style="width: 3px; background: linear-gradient(#64CE772A 1%, #2ea043 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" md:float-right pt-16 pb-36">
              <div class="flex">
                <div class="lg:block hidden">
                  <img src="{{ asset('img/productivity.svg') }}" alt="svg">
                 </div >
                   <div class=" md:w-96 w-full mx-auto md:mx-0" >
                    <div class="md:ml-10 sm:mx-24 mx-10 md:mx-0">
                      <p class="  font-black text-xl sm:text-3xl text-green-500">প্রগ্রামিং-এ আগ্রহী?</p>
                   <p class=" mt-4 text-gray-400 text-lg leading-8">
                    আপনি কি প্রোগ্রামিং জগতে ডুব দিতে প্রস্তুত? আমরা আপনাকে পথের প্রতিটি ধাপে সাহায্য করতে এখানে আছি।
                    আমাদের ওয়েবসাইটটি ব্যাপক নির্দেশিকা, টিউটোরিয়াল এবং সংস্থানগুলিতে পূর্ণ যা আপনাকে বিভিন্ন ধরণের প্রোগ্রামিং ভাষা এবং ধারণাগুলিতে গতি আনতে সাহায্য করবে।
                    তাই আপনার প্রিয় পানীয় নিন এবং আপনার প্রোগ্রামিং যাত্রা শুরু করা যাক!
                   </p>
                    </div>
                   </div>
              </div>
             </div>
            </div>
            <div class=" md:w-1/2 lg:w-1/3 w-full pb-16 md:pt-40">
             <img class=" -mt-12" src="{{ asset('img/php-logic-example.png') }}" alt="Code">
          </div>
          </div>
        </div>
      </div>


      <div class=" 2xl:ml-28 xl:ml-26 md:ml-2   md:pb-14">
        <div>
          <div class="md:flex block md:justify-around ">
            <div class=" md:mb-10 md:mt-5 -mt-14">
              <div class="lg:block hidden">
                <div class="-ml-2 text-xl text-white" >
                  <span ><i class="fa-solid fa-layer-group mt-10 mb-5" ></i></span>
                </div>
              </div>
             <div class="  md:mr-5 md:float-left h-full lg:block hidden" style="width: 3px; background: linear-gradient(#d2a8ff, #a371f7 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" md:float-right py-16 mx-auto" style="max-width: 95%;">
              <img src="{{ asset('img/code-2.png') }}"   alt="Code">
             </div>
            </div>
            <div class=" pb-16 pt-4 flex justify-center items-center w-full" >
             <div class="mx-5 md:mx-0">
              <p class="  font-black text-xl sm:text-3xl text-green-500 ">ওয়েব ডেভেলপমেন্টে আগ্রহী?</p>
              <p class=" text-gray-400 mt-4 leading-8">
                আপনার ওয়েব ডেভেলপমেন্ট শিখার যাত্রার পথে আমরা আপনাকে এখানে পেয়ে আনন্দিত।
                আমাদের ওয়েবসাইট উচ্চ-মানের সংস্থান এবং টিউটোরিয়াল দিয়ে পরিপূর্ণ যা আপনাকে শুরু করতে এবং দক্ষ করতে সাহায্য করবে।
                তো চলুন শুরু করা যাক!
              </p>
             </div>
            </div>
          </div>
        </div>
      </div>


</div>

    </section>
  </div>
@endsection

