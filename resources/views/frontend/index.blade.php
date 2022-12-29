@extends('frontend.header_footer', [
    'slot' => null,
])
@section('content')
  <div>
    <div>
      <div>
        <div class="pt-20 duration-700 lg:pt-32" :class="open ? 'blur-sm' : ''">
          <h1 class="text-center text-4xl font-black md:text-6xl lg:text-7xl"><span
                  class="bg-gradient-to-r from-gray-500 to-gray-400 bg-clip-text text-transparent">লারা</span> <span
                  class="bg-gradient-to-r from-gray-500 to-gray-400 bg-clip-text text-5xl text-transparent md:text-7xl lg:text-8xl">বাংলা</span></h1>
          <h2 class="pb-10 pt-6 text-center text-4xl font-black text-gray-500 sm:text-4xl md:text-6xl lg:text-7xl">এবার শিখা হোক বাংলায়</h2>
          <h3 class="px-5 text-center text-xl font-semibold text-gray-500">ফ্রি অনলাইন ডকুমেন্টেশন ওয়েব সাইট</h3>
          <div class="mt-14 flex justify-center">
            <div class="m-2"><a href="{{ route('send.to.docs',['technology_slug'=>'laravel']) }}" class="btn-lg rounded-full bg-gray-500 text-white hover:bg-gray-600 hover:ring-blue-200" href="#">লারাভেল ডক</a>
            </div>
            <div class="m-2"><a class="btn-lg rounded-full bg-gray-500 px-16 text-white hover:bg-gray-600 hover:ring-blue-200"
                 href="#">ব্লগ</a></div>

          </div>
        </div>
      </div>
    </div>

    <!-- home content section -->
    <section class="mt-20 mb-20 duration-700 md:mb-0 md:px-10 lg:px-6" :class="open ? 'blur-sm' : ''">
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
    </section>
   
    <section class="py-12 mt-10 bg-gray-900" >

<div>
  

      <div>
        <div>
          <div class="flex justify-around ">
            <div class=" -mb-10">

           


             <div class=" ml-10 mr-5 float-left h-full" style="width: 3px; background: linear-gradient(#d2a8ff, #a371f7 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" float-right py-16">
               <p class="  font-black text-3xl text-green-500">আপনি কি শিক্ষানবিস?</p>
               <p class=" mt-4 text-white text-lg"> নতুন টেকনলজি শিখতে চাচ্ছেন? লারা বাংলা আপনার সাথেই আছে।</p>
             </div>
            </div>
            <div class=" w-1/3 py-16">
      <div class="code-toolbar"><pre class="language-php" tabindex="0"><code class="language-php">composer <span class="token keyword">global</span> <span class="token keyword">require</span> laravel<span class="token operator">/</span>installer 
laravel <span class="token keyword">new</span> <span class="token class-name">example</span><span class="token operator">-</span>app</code></pre><div class="toolbar"><div class="toolbar-item"><button class="copy-to-clipboard-button" type="button" data-copy-state="copy"><span>Copy</span></button></div></div></div>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div>
          <div class="flex justify-around ">
            <div class=" mb-10 mt-5">

              <div>
                <div class="ml-8  text-xl text-white" >
                  <span ><i class="fa-solid fa-layer-group mt-10 mb-5" ></i></span>
                  
                </div>
              </div>


             <div class=" ml-10 mr-5 float-left h-full" style="width: 3px; background: linear-gradient(#d2a8ff, #a371f7 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" float-right py-16">
               <p class="  font-black text-3xl text-green-500">আপনি কি শিক্ষানবিস?</p>
               <p class=" mt-4 text-white text-lg"> নতুন টেকনলজি শিখতে চাচ্ছেন? লারা বাংলা আপনার সাথেই আছে।</p>
             </div>
            </div>
            <div class=" w-1/3 pb-16 pt-40">
      <div class="code-toolbar"><pre class="language-php" tabindex="0"><code class="language-php">composer <span class="token keyword">global</span> <span class="token keyword">require</span> laravel<span class="token operator">/</span>installer 
laravel <span class="token keyword">new</span> <span class="token class-name">example</span><span class="token operator">-</span>app</code></pre><div class="toolbar"><div class="toolbar-item"><button class="copy-to-clipboard-button" type="button" data-copy-state="copy"><span>Copy</span></button></div></div></div>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div>
          <div class="flex justify-around ">
            <div class=" mb-10 mt-5">

              <div>
                <div class="-ml-10 text-xl text-white" >
                  <span ><i class="fa-solid fa-layer-group mt-10 mb-5" ></i></span>
                  
                </div>
              </div>


             <div class=" -ml-8 mr-5 float-left h-full" style="width: 3px; background: linear-gradient(#d2a8ff, #a371f7 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             <div class=" float-right py-16">
              <img src="{{ asset('img/css.png') }}" style="max-height: 700px;" alt="Code">
             </div>
            </div>
            <div class=" pb-16 pt-40 w-96">
              <p class="  font-black text-3xl text-green-500">আপনি কি শিক্ষানবিস?</p>  
          </div>
          </div>
        </div>
      </div>

      <div>
        <div>
          <div class="flex justify-around ">
            <div class=" mb-10 mt-5 ml-7">

              <div>
                <div class="ml-9  text-xl text-white" >
                  <span ><i class="fa-solid fa-layer-group mt-10 mb-5" ></i></span>
                  
                </div>
              </div>


             <div class=" ml-11 float-left h-full" style="width: 3px; background: linear-gradient(#64CE772A 1%, #2ea043 10%, #196c2e 70%, #2ea043 80%, #56d364);"></div>
             
             <div class=" float-right pt-16 pb-36">
              <div class="flex">
                <div class="">
                  <img src="{{ asset('img/productivity.svg') }}" alt="svg">
                 </div>
    
                   <div>
                    <p class="  font-black text-3xl text-green-500">আপনি কি শিক্ষানবিস?</p>
                   <p class=" mt-4 text-white text-lg"> নতুন টেকনলজি শিখতে চাচ্ছেন? লারা বাংলা আপনার সাথেই আছে।</p>
                   </div>

                   
                   
              </div>

              <div class=" ml-32 -mt-72">
                <p class="  font-black text-3xl text-green-500">আপনি কি শিক্ষানবিস?</p>
               <p class=" mt-4 text-white text-lg"> নতুন টেকনলজি শিখতে চাচ্ছেন? লারা বাংলা আপনার সাথেই আছে।</p>
               </div>

              

             </div>
             
            </div>
            <div class=" w-1/3 pb-16 pt-40">
             <img src="{{ asset('img/code-2.png') }}" alt="Code">
          </div>
          </div>
        </div>
      </div>
       
    
  
</div>

    </section>
  </div>
@endsection
