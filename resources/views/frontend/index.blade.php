@extends('frontend.header_footer', [
    'slot' => null,
])
@section('content')
  <div class="bg-gray-900">
    <div>
      <div>
        <div class="pt-20 duration-700 lg:pt-32" :class="open ? 'blur-sm' : ''">
          <h1 class="text-center text-4xl font-black md:text-6xl lg:text-7xl"><span
                  class="bg-gradient-to-r from-blue-500 to-amber-400 bg-clip-text text-transparent">লারা</span> <span
                  class="bg-gradient-to-r from-red-500 to-green-400 bg-clip-text text-5xl text-transparent md:text-7xl lg:text-8xl">বাংলা</span></h1>
          <h2 class="pb-10 pt-6 text-center text-4xl font-black  sm:text-4xl md:text-6xl lg:text-7xl"> 
            <span class="bg-gradient-to-r from-blue-500  via-red-400 to-green-500 bg-clip-text  text-transparent">এবার শিখা হোক বাংলায়</span> </h2>
          <h3 class="px-5 text-center text-xl font-semibold text-green-500">ফ্রি অনলাইন ডকুমেন্টেশন ওয়েব সাইট</h3>
          <div class="mt-14 flex justify-center">
            <div class="m-2"><a href="{{ route('send.to.docs',['technology_slug'=>'laravel']) }}" class="btn-lg rounded-full text-white  bg-green-600  hover:bg-green-700  hover:ring-amber-400 " href="#">লারাভেল ডক</a>
            </div>
            <div class="m-2"><a class="btn-lg rounded-full bg-green-600 px-16 text-white hover:bg-green-700 hover:ring-amber-400 "
                 href="#">ব্লগ</a></div>

          </div>
        </div>
      </div>
    </div>

    <!-- home content section -->
    {{-- <section class="mt-20 mb-20 duration-700 md:mb-0 md:px-10 lg:px-6" :class="open ? 'blur-sm' : ''">
      <div class="grid grid-cols-12 gap-3 p-3 md:gap-10">

        @for ($i = 1; $i <= 8; $i++)
          <div class="col-span-6 mt-3 md:col-span-6 md:mt-0 lg:col-span-3">
            <a href="#">
              <div class="block bg-gray-300 shadow-xl duration-300 hover:shadow-2xl md:flex md:border-l-8 md:border-stone-500">
                <div class="h-32 md:h-40">
                  <img class="h-32 w-full pr-0 md:h-40 md:pr-5" src="{{ asset('assets/img/laravel.png') }}" alt="Technology">

                </div>
                <div class="pt-4">
                  <h5 class="pl-2 text-2xl font-black md:pl-0">লারাভেল</h5>
                  <div class="text-md mt-2 pb-3 pl-2 font-medium md:mt-4 md:pb-0 md:pl-0 md:text-2xl md:font-medium">
                    <p>লারাভেল পিএইচপি ফ্রেমওয়ার্ক</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endfor

      </div>
    </section> --}}

    {{-- <div class="bg-gradient-to-b from-white to-gray-900 h-52"></div> --}}
   
    <section class="pb-12  bg-gray-900 mt-28 container mx-auto " :class="open ? 'blur-sm' : ''" >

      
     {{-- subcription --}}
    <div class=" md:pl-44 mb-32 md:-ml-10">
     <div class="lg:flex justify-center ">
      <div  >
        <form action="#" class="mx-auto">
          <label for="newsleter" class=" text-white block mb-3 md:text-left text-center">আপডেট নিউজ ই-মেইলে পেতে সাবস্ক্রাইব করুন</label>
          <div class="flex justify-center md:justify-start mx-2 sm:mx-0">
            <div>
              
              <input type="text" class=" lg:pr-32 md:pr-24 sm:pr-10 pr-1 rounded-l" id="newsleter" placeholder="ইমেল অ্যাড্রেস" style="padding-top: 12px; padding-bottom:12px;">
            </div>
            <div>
              <div class="bg-green-600 py-4 lg:px-20 md:px-16 sm:px-10 px-5 rounded-r hover:bg-green-700 ">
                <button type="submit" class=" text-md font-bold text-white">সাবস্ক্রাইব</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      {{-- create account  --}}
      <div class=" xl:ml-20  md:ml-16 text-center">
        <div class=" block mt-12 pt-1 ">
          <div class=" ">
            <a href="{{ route('register') }}" class=" bg-transparent font-medium border-2 border-green-600 px-14 sm:px-32  xl:px-32 lg:px-10 md:-ml-40 lg:ml-0  rounded text-white hover:bg-green-700  " style="padding-top: 12px; padding-bottom:12px;">একাউন্ট তৈরি করুন</a>
          </div>
        </div>
      </div>
     </div>
      </div>
 {{-- /subcription --}}
      <div>
          <div class="md:flex block md:justify-around 2xl:-ml-5 xl:-ml-10 lg:-ml-16 mx-10 md:mx-0">
            <div class="mx-auto md:mx-0">
             <div class="  md:mr-5 md:float-left h-full lg:block md:hidden" style="width: 3px; background: linear-gradient(#d2a8ff, #a371f7 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" md:float-right py-16 ">
               <p class="  font-black text-3xl text-green-500">আপনি কি শিক্ষানবিস?</p>
               <p class=" mt-4 text-white text-lg"> নতুন টেকনলজি শিখতে চাচ্ছেন? লারা বাংলা আপনার সাথেই আছে।</p>
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
              <p class="  font-black text-3xl text-green-500 ">ওয়েব ডিজাইনে আগ্রহী?</p>  
              <p class=" text-white mt-4 leading-8">আপনি যদি ওয়েব ডিজাইন শিখতে আগ্রহী হন, আপনি সঠিক জায়গায় এসেছেন। এখানে আপনি বিভিন্ন রিসোর্স এবং টিউটোরিয়াল পাবেন যা আপনাকে ওয়েব ডিজাইনের উত্তেজনাপূর্ণ ক্ষেত্রে শুরু করতে সাহায্য করবে। আপনি প্রাথমিক বিষয়গুলি শিখছেন এমন একজন শিক্ষানবিস বা একজন অভিজ্ঞ ডিজাইনার যা আপনার দক্ষতা বাড়াতে চান?, আমাদের সবার জন্য কিছু না কিছু আছে৷ তাই এক কাপ কফি নিন, আরাম করুন, এবং আসুন একসাথে শেখা শুরু করি!</p>
             
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
                      <p class="  font-black text-3xl text-green-500">প্রগ্রামিং-এ আগ্রহী?</p>
                   <p class=" mt-4 text-white text-lg leading-8">
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
              <p class="  font-black text-3xl text-green-500 ">ওয়েব ডেভেলপমেন্টে আগ্রহী?</p>  
              <p class=" text-white mt-4 leading-8">
                আপনার ওয়েব ডেভেলপমেন্ট শিখার যাত্রার পথে আমরা আপনাকে এখানে এখানে পেয়ে আনন্দিত।
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

