<div class=" mt-3 md:mt-10 mb-24">
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
                        <div class="  pr-3 
                        @guest
                        lg:col-span-6
                        lg:border-r-2 lg:border-r-slate-500
                        @else
                        lg:col-span-12
                        @endguest
                        ">
                          
                            <div class=" mx-0 md:mx-5 lg:mx-5 xl:mx-20">
                                {{ $slot }}
                                @guest
                                <div class="mt-6 mx-auto">
                                    <div class=" text-center mb-5">
                                        <p class="  font-semibold text-sm text-gray-500">অথবা</p>
                                        <p class="  font-semibold text-sm text-gray-500">সামাজিক একাউন্ট দ্বারা লগিন করুন</p>
                                    </div>
                                    <div class="flex justify-center">
                                        <div class="flex justify-center mr-3">
                                            <a href="{{ route('socialLogin.redirect',['provider'=>'google']) }}" type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block p-3 sm:p-4 mb-2 bg-gray-100 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-lg hover:shadow-xl focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out" >
                                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-8 h-6 sm:h-8" viewBox="0 0 48 48" ><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                                            </a>
                                        </div>
                                        <div class="flex justify-center mr-3">
                                            <a href="{{ route('socialLogin.redirect',['provider'=>'facebook']) }}" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block p-3 sm:p-4 mb-2 bg-gray-100 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-lg hover:shadow-xl focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-8 h-6 sm:h-8" viewBox="0 0 48 48" width="48px" height="48px"><path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"/><path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"/></svg>
                                            </a>
                                        </div>
                                        <div class="flex justify-center mr-3">
                                            <a href="{{ route('socialLogin.redirect',['provider'=>'twitter']) }}" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block p-3 sm:p-4 mb-2 bg-gray-100 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-lg hover:shadow-xl focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-8 h-6 sm:h-8" viewBox="0 0 48 48" width="48px" height="48px"><path fill="#03A9F4" d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429"/></svg>
                                            </a>
                                        </div>
                                        <div class="flex justify-center mr-3">
                                            <a href="{{ route('socialLogin.redirect',['provider'=>'github']) }}" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block p-3 sm:p-4 mb-2 bg-gray-100 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-lg hover:shadow-xl focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out" >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 sm:w-8 h-6 sm:h-8"  viewBox="0 0 64 64" width="48px" height="48px"><path d="M32 6C17.641 6 6 17.641 6 32c0 12.277 8.512 22.56 19.955 25.286-.592-.141-1.179-.299-1.755-.479V50.85c0 0-.975.325-2.275.325-3.637 0-5.148-3.245-5.525-4.875-.229-.993-.827-1.934-1.469-2.509-.767-.684-1.126-.686-1.131-.92-.01-.491.658-.471.975-.471 1.625 0 2.857 1.729 3.429 2.623 1.417 2.207 2.938 2.577 3.721 2.577.975 0 1.817-.146 2.397-.426.268-1.888 1.108-3.57 2.478-4.774-6.097-1.219-10.4-4.716-10.4-10.4 0-2.928 1.175-5.619 3.133-7.792C19.333 23.641 19 22.494 19 20.625c0-1.235.086-2.751.65-4.225 0 0 3.708.026 7.205 3.338C28.469 19.268 30.196 19 32 19s3.531.268 5.145.738c3.497-3.312 7.205-3.338 7.205-3.338.567 1.474.65 2.99.65 4.225 0 2.015-.268 3.19-.432 3.697C46.466 26.475 47.6 29.124 47.6 32c0 5.684-4.303 9.181-10.4 10.4 1.628 1.43 2.6 3.513 2.6 5.85v8.557c-.576.181-1.162.338-1.755.479C49.488 54.56 58 44.277 58 32 58 17.641 46.359 6 32 6zM33.813 57.93C33.214 57.972 32.61 58 32 58 32.61 58 33.213 57.971 33.813 57.93zM37.786 57.346c-1.164.265-2.357.451-3.575.554C35.429 57.797 36.622 57.61 37.786 57.346zM32 58c-.61 0-1.214-.028-1.813-.07C30.787 57.971 31.39 58 32 58zM29.788 57.9c-1.217-.103-2.411-.289-3.574-.554C27.378 57.61 28.571 57.797 29.788 57.9z"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endguest
                            </div>
                        </div>
                        {{-- show login,register section just to guest users --}}
                        @guest
                        <div class=" lg:col-span-6">
                            <div  class=" mx-5 md:mx-5 lg:mx-5 xl:mx-20
                            @if (Request::route()->getName() == 'login')
                            lg:mt-16 mt-10
                            @elseif(Request::route()->getName() == 'register')
                            lg:mt-40 mt-10
                            @endif
                            ">
                                {{-- globe --}}
                                <div class="glob">
                                    <div class="text-center lg:pt-10 sm:pt-5 pt-5" style="cursor: pointer;">
                                        <canvas id='globe' width='500' height='500' class="img-responsive mx-auto"
                                        style='width: 45%; max-height: 200px;'></canvas>
                                    </div>
                                @if (Request::route()->getName() == 'login')
                                    <div class="pt-10">
                                        <h3 class=" font-bold text-lg text-center">একাউন্ট নাই?</h3>
                                        <div class="text-center mt-5">
                                            <a href="{{route('register')}}" class=" bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 shadow-md shadow-gray-500/50 px-5 py-3 rounded text-gray-50 font-semibold text-sm">রেজিস্টার করুন</a>
                                        </div>
                                    </div>
                                @else
                                <div class="pt-10">
                                    <h3 class=" font-bold text-lg text-center">ইতিমধ্যে একাউন্ট আছে?</h3>
                                    <div class="text-center mt-5">
                                        <a href="{{route('login')}}" class=" bg-gradient-to-r from-slate-500 via-slate-400 to-slate-500 shadow-md shadow-gray-500/50 px-5 py-3 rounded text-gray-50 font-semibold text-sm">লগিন করুন</a>
                                    </div>
                                </div>
                                @endif
                                </div>
                                {{-- globe end--}}
                            </div>
                        </div>
                        @endguest
             
                    </div>
                  </div>
        </div>
    </div>
</div>
