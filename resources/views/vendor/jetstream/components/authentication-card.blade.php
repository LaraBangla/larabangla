<div class="mt-10 mb-24">
    <div class=" w-full md:w-2/3 mx-auto ">
        <div class="border rounded shadow shadow-gray-500/40 mx-3 md:mx-0">
        {{-- <div>
            {{ $logo }}
            <img src="{{ asset('img/logo.png') }}" alt="LaraBangla Logo" width="80">
        </div> --}}

          {{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div> --}}
                <div class="pt-10 pb-20 mx-3">
    
                    <div class=" lg:grid lg:grid-cols-12 lg:gap-5">
                        <div class=" lg:col-span-6 pr-3 lg:border-r-2 lg:border-r-slate-500">
                          
                            <div class=" mx-5 md:mx-5 lg:mx-5 xl:mx-20">
                                {{ $slot }}
                            </div>
                        </div>
                        <div class=" lg:col-span-6">
                            <div  class=" mx-5 md:mx-5 lg:mx-5 xl:mx-20 lg:mt-16 mt-10">
                                {{-- globe --}}
                                <div class="glob">
                                    <div class="text-center lg:pt-4 sm:pt-5 pt-5" style="cursor: pointer;">
                                        <canvas id='globe' width='500' height='500' class="img-responsive mx-auto"
                                        style='width: 45%; max-height: 200px;'></canvas>
                                    </div>
                                    <div class="pt-10">
                                        <h3 class=" font-bold text-lg text-center">একাউন্ট নাই?</h3>
                                        <div class="text-center mt-5">
                                            <a href="{{route('register')}}" class=" bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 shadow-md shadow-gray-500/50 px-5 py-3 rounded ">রেজিস্টার করুন</a>
                                        </div>
                                    </div>
                                </div>
                                {{-- globe end--}}
                            </div>
                        </div>
                    </div>
                  </div>
        </div>

    
       
    </div>
</div>
