<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/45ee9bbd89.js" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Tailwind</title>
</head>

<body class=" bg-gray-50">
    <div x-data="{ open: false }" @resize.window="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if (width > 640) {
    open = false
    }">
        <div class="bg-gray-200 ">

            <div>
                <!-- class="container" -->
                <!-- <div class="float-left pt-5 sm:pt-7 pl-3">
                <a href="#" class="font-bold text-2xl">Lara Bangla</a>
            </div> -->
                <ul class="flex justify-end py-6 mr-4" x-data="{ user: false }">
                    <li><a href="#" class="font-bold text-2xl pl-5 text-gray-600">লারা <span class=" text-3xl">বাংলা</span></a></li>
                    <li class=" grow"></li>
                    <li class="hidden md:block px-5 py-3 mx-1 duration-500 text-gray-600 bg-gray-300"><a class="font-bold" href="#"><i class="fa fa-home"></i> হোম</a></li>
                    <li class="hidden md:block px-5 py-3 mx-1 duration-500 text-gray-600 hover:bg-gray-300 "><a class="font-bold" href="#">টিউটোরিয়াল</a></li>
                    <li class="hidden md:block px-5 py-3 mx-1 duration-500 text-gray-600 hover:bg-gray-300 "><a class="font-bold" href="#">সার্ভিস</a></li>
                    <li class="hidden md:block px-5 py-3 mx-1 duration-500 text-gray-600 hover:bg-gray-300 "><a class="font-bold" href="#">ব্লগ</a></li>
                    <li class="hidden md:block px-5 py-3 mx-1 duration-500 text-gray-600 hover:bg-gray-300 "><a class="font-bold" href="#">সম্পর্কে</a></li>
                    <li class="hidden md:block px-5 py-3 mx-1 duration-500 text-gray-600 hover:bg-gray-300 "><a class="font-bold" href="#">যোগাযোগ</a></li>
                    <li class="hidden md:block px-3 py-3 mx-1 duration-500 text-gray-600 " @click="user = ! user" @click.outside="user=false"><a class="font-bold"><i class="fa-solid fa-user"></i></a>
                        <div class=" bg-slate-50 rounded mt-2 absolute right-2 border" x-show="user">
                            <ul class="py-5">
                                <li class=" py-2 font-semibold hover:bg-slate-100 px-5 rounded-sm"><a href="#"><span class=" text-gray-500"><i class="fa fa-sign-in mr-2 "></i></span>লগিন</a></li>
                                <li class=" py-2 font-semibold hover:bg-slate-100 px-5 rounded-sm"><a href="#"><span class=" text-gray-500"><i class="fa-solid fa-user-plus mr-2 "></i></span>রেজিস্টার</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="hidden md:block px-2 py-3 mx-1 duration-500 text-gray-600 " x-data="{ search: false }">
                        <a @click="search = ! search" class="font-bold"><span class=" text-xl"><i class="fa-solid fa-magnifying-glass"></i></span></a>
                        <!-- search -->
                        <div class=" bg-slate-50 rounded-lg mt-2 absolute right-2 border" x-show="search" @click.outside="search=false" x-transition:enter="transition ml-2 duration-300" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                            <form class="px-6 h-32 flex items-center justify-center w-full">
                                <div><input type="text" placeholder="অনুসন্ধান" class="py-4 border rounded-l-lg w-80"></div>
                                <div>
                                    <button class=" bg-slate-500 p-5 rounded-r-lg font-semibold text-base text-gray-50" type="submit">অনুসন্ধান</button>
                                </div>
                            </form>
                        </div>

                    </li>

                    <li class="hidden md:block py-3 mx-1 duration-500 text-gray-600  " x-data="{ option: false }">
                        <a @click="option = ! option" @click.outside="option=false" class=" font-bold px-2"><span class=" text-xl"><i class="fa fa-ellipsis-v"></i></span>
                    </a>
                        <!-- options -->
                        <div class=" bg-slate-50 rounded mt-2 absolute right-2 border" x-show="option">
                            <ul class="py-5">
                                <li class=" py-2 font-semibold hover:bg-slate-100 px-5 rounded-sm"><a href="#"><span class=" text-gray-500"><i class="fa fa-sign-in mr-2 "></i></span>একাউন্ট</a></li>
                                <li class=" py-2 font-semibold hover:bg-slate-100 px-5 rounded-sm"><a href="#"><span class=" text-gray-500"><i class="fa-solid fa-user-plus mr-2 "></i></span>সেটিংস</a></li>
                            </ul>
                        </div>
                    </li>



                    <div class=" md:hidden text-4xl text-gray-600 float-left" @click="open = ! open">
                        <i class="fa fa-bars "></i>
                    </div>
                </ul>
            </div>
        </div>

        <div class=" w-screen  ">

            <div class=" absolute top-0 left-0 z-50 w-1/2 md:w-2/12 h-screen bg-gray-100 duration-700" x-show="open" x-transition:enter="transition ml-2 duration-300" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" @click.outside="open=false">
                <div class="border-b p-5 text-center text-gray-600">
                    <a href="#" class=" font-bold ">
                        <!-- <img class="block mx-auto pt-5" src="src/img/logo.png" width="70" alt=""> -->
                        <span class=""><span class=" text-2xl">লারা</span>&nbsp;&nbsp;<span class=" text-3xl">বাংলা</span></span>
                        <p class=" font-normal text-right pr-4" style="font-size: 10px;">এবার শিখা হোক বাংলায়</p>
                    </a>
                </div>
                <div class="pl-4 pb-2">
                    <ul class="pt-6">
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa fa-home mr-4 "></i></span>Home</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa-solid fa-blog mr-4 "></i></span>Blog</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa-solid fa-users mr-4 "></i></span>Team</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600">
                            <a href="#"> <span class="text-xl text-gray-500"><i class="fa fa-info-circle mr-4 "></i></span>About</a>
                        </li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600">
                            <a href="#"> <span class="text-xl text-gray-500"><i class="fa fa-sign-in mr-4 "></i></span>Login</a>
                        </li>
                    </ul>
                </div>
                <div class="pt-5 pl-5">
                    <div class=" border-b pb-3">
                        <span class=" font-semibold text-xl text-gray-600">Services</span>

                    </div>
                    <ul class="pt-4">
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa fa-home mr-4 "></i></span>Home</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa-solid fa-blog mr-4 "></i></span>Blog</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa-solid fa-users mr-4 "></i></span>Team</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600">
                            <a href="#"> <span class="text-xl text-gray-500"><i class="fa fa-info-circle mr-4 "></i></span>About</a>
                        </li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600">
                            <a href="#"> <span class="text-xl text-gray-500"><i class="fa fa-sign-in mr-4 "></i></span>Login</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- body section -->
            <div>

                <section>
                    @yield('content')
                </section>

                <!-- bottom bar -->
                <div>
                    <div class="w-20 h-20 bg-gray-50  z-10  rounded-full fixed  bottom-28 right-3 -ml-9 border border-gray-100 shadow-lg duration-700 " :class="open ? 'blur-sm' : ''">
                        <div class="text-center mt-6 text-gray-600 font-black text-2xl">
                            <a class="text-center" href="#"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </div>



                    <div class="fixed bottom-0 w-screen rounded-lg border border-gray-300 bg-slate-100 md:hidden duration-700" :class="open ? 'blur-sm' : ''">
                        <ul class="flex justify-around">
                            <li class="px-4 py-6 font-bold text-gray-600"><a href="#"><span class="text-xl"><i class="fa-solid fa-book mr-2 "></i></span></a></li>
                            <li class="px-4 py-6 font-bold text-gray-600"><a href="#"><span class="text-xl"><i class="fa fa-home mr-2 "></i></span></a></li>
                            <!-- <li class="px-4 py-6 font-bold text-gray-600"></li> -->
                            <li class="px-4 py-6 font-bold text-gray-600"><a href="#"><span class="text-xl"><i class="fa-solid fa-user mr-2 "></i></span></a></li>
                        </ul>
                    </div>
                </div>

                <!-- footer start -->
                <footer class=" pt-12 duration-700 " :class="open ? 'blur-sm' : ''">
                    <!-- footer top -->
                    <div class="bg_footer_1 text-gray-300 pl-2 md:pl-0">
                        <div class="container mx-auto block md:flex md:justify-evenly py-2">
                            <div>
                               <div class="flex items-center py-2 md:py-0">
                                <div class="w-20 h-20 bg-transparent rounded-full text-center  border border-gray-600 ">
                                    <div class="mt-5">
                                        <span class=" text-3xl "><i class="fa-solid fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="h-12  bg-transparent rounded-r-xl -ml-2 px-5 py-3 border-gray-600 border border-l-0">
                                    <span class=" text-xl font-medium">017777777777</span>
                                </div>
                               </div>
                            </div>

                            <div>
                                <div class="flex items-center py-2 md:py-0">
                                    <div class="h-12 bg-transparent rounded-l-xl -mr-2 px-5 py-3 border border-gray-600 border-r-0 z-10 hidden md:block">
                                        <span class=" text-xl font-medium">017777777777</span>
                                    </div>
                                 <div class="w-20 h-20 bg-transparent-500 rounded-full text-center border-gray-600 border">
                                     <div class="mt-5">
                                         <span class=" text-3xl "><i class="fa-solid fa-home"></i></span>
                                     </div>
                                 </div>
                                 <div class="h-12 bg-transparent-500 rounded-r-xl -ml-2 px-5 py-3 border-gray-600  border border-l-0">
                                    <span class=" text-xl font-medium">017777777777</span>
                                </div>
                                </div>
                             </div>
                            <div>
                                <div class="flex items-center py-2 md:py-0">
                                    <div class="h-12 bg-transparent-500 rounded-l-xl -mr-2 px-5 py-3 border border-gray-600 border-r-0 z-10 hidden md:block">
                                        <span class=" text-xl font-medium">017777777777</span>
                                    </div>
                                 <div class="w-20 h-20 bg-transparent-500 rounded-full text-center border border-gray-600">
                                     <div class="mt-5">
                                         <span class=" text-3xl "><i class="fa-solid fa-phone"></i></span>
                                     </div>
                                 </div>

                                 <div class="h-12 bg-transparent-500 rounded-r-xl -ml-2 px-5 py-3 border-gray-600  border border-l-0 md:hidden">
                                    <span class=" text-xl font-medium">017777777777</span>
                                </div>

                                </div>
                             </div>
                        </div>
                    </div>
                    <!-- footer end -->

                    <!-- footer middle -->
                    <div class="bg_footer_2 leading-7 text-gray-300 pl-4 md:pl-0">
                        <div class="container mx-auto">
                            <div class=" grid grid-cols-12 py-5 gap-4">
                                <div class=" col-span-12 md:col-span-3">
                                       <h6 class=" border-b border-gray-700"><span class=" text-2xl">লারা </span><span class=" text-3xl">বাংলা</span></h6>
                                        <ul class="pt-2">
                                            <li><a href="#">হোম</a></li>
                                            <li><a href="#">লারাভেল</a></li>
                                            <li><a href="#">স্প্লেড</a></li>
                                            <li><a href="#">লাইভ ওয়্যার</a></li>
                                        </ul>
                                </div>
                                <div class=" col-span-12 md:col-span-3">
                                    <h6 class=" border-b  border-gray-700 pb-1"><span class=" text-2xl ">তথ্য </span></h6>
                                     <ul class="pt-2">
                                         <li><a href="#">আমাদের সম্পর্কে</a></li>
                                         <li><a href="#">যোগাযোগ করুন</a></li>
                                         <li><a href="#">ব্লগ</a></li>
                                         <li><a href="#">ফোরাম</a></li>
                                     </ul>
                             </div>
                             <div class=" col-span-12 md:col-span-3">
                                <h6 class=" border-b  border-gray-700 pb-1"><span class=" text-2xl">গুরুত্বপূর্ণ লিংকস </span></h6>
                                 <ul class="pt-2">
                                     <li><a href="#">একাউন্ট</a></li>
                                     <li><a href="#">টিউটোরিয়াল</a></li>
                                     <li><a href="#">কমিউনিটি</a></li>
                                     <li><a href="#">সেটিংস</a></li>

                                 </ul>
                         </div>
                         <div class=" col-span-12 md:col-span-3">
                            <h6 class=" border-b  border-gray-700 pb-1"><span class=" text-2xl">আমাদের সম্পর্কে </span></h6>
                            <p class="pt-3">
                                জীবের মধ্যে সবচেয়ে সম্পূর্ণতা মানুষের। কিন্তু সবচেয়ে অসম্পূর্ণ হয়ে সে জন্মগ্রহণ করে। বাঘ ভালুক তার জীবনযাত্রার পনেরো- আনা মূলধন নিয়ে আসে প্রকৃতির মালখানা থেকে। জীবরঙ্গভূমিতে মানুষ এসে দেখা দেয় দুই শূন্য হাতে মুঠো বেঁধে।
                            </p>
                     </div>

                     <div class=" col-span-12 md:col-span-3 md:pt-8">
                        <h6 class=" border-b  border-gray-700 pb-1"><span class=" text-2xl">সমর্থন </span></h6>
                         <ul class="pt-2">
                             <li><a href="#">প্রশ্ন</a></li>
                             <li><a href="#">সাহায্য</a></li>
                             <li><a href="#">সাইটম্যাপ</a></li>
                         </ul>
                 </div>

                 <div class=" col-span-12 md:col-span-3 md:pt-8">
                    <h6 class=" border-b  border-gray-700 pb-1"><span class=" text-2xl">আইনি </span></h6>
                     <ul class="pt-2">
                         <li><a href="#">গোপনীয়তা নীতি</a></li>
                         <li><a href="#">শর্তাবলী</a></li>
                         <li><a href="#">ব্যবহারের শর্তাবলী</a></li>
                         <li><a href="#">কপিরাইট</a></li>

                     </ul>
             </div>

             <div class=" col-span-12 md:col-span-3 md:pt-8">
                <h6 class=" border-b  border-gray-700 pb-1"><span class=" text-2xl">সেবা সমূহ </span></h6>
                 <ul class="pt-2">
                     <li><a href="#">টিউটোরিয়াল</a></li>
                     <li><a href="#">ওয়েব ডিজাইন এবং ডেভেলপমেন্ট</a></li>
                     <li><a href="#">অ্যাপস ডেভেলপমেন্ট</a></li>
                     <li><a href="#">সফটওয়্যার ডেভেলপমেন্ট</a></li>
                 </ul>
         </div>

         <div class=" col-span-12 md:col-span-3 md:pt-8 pb-5 md:pb-0 ">
            <h6 class=" border-b  border-gray-700 pb-1"><span class=" text-2xl">আমাদের অনুসরণ করুন </span></h6>
             <div class="pt-4 flex items-center gap-3 ">
                 <div class=" duration-300 w-10 h-10  bg-blue-800 hover:bg-blue-900 text-white rounded-full text-center">
                    <div class="mt-2">
                        <a href="#"><span class=" text-xl pt-8"><i class="fa-brands fa-facebook-f"></i></span></a>
                    </div>
                 </div>

                 <div class="duration-300 w-10 h-10 bg-sky-500 hover:bg-sky-600 text-gray-200 rounded-full text-center">
                    <div class="mt-2">
                        <a href="#"><span class=" text-xl pt-8"><i class="fa-brands fa-twitter"></i></span></a>
                    </div>
                 </div>

                 <div class="duration-300 w-10 h-10 bg-pink-700 hover:bg-pink-800 text-white rounded-full text-center">
                    <div class="mt-1.5">
                        <a href="#"><span class=" text-xl pt-8"><i class="fa-brands fa-instagram"></i></i></span></a>
                    </div>
                 </div>

                 <div class="duration-300 w-10 h-10  bg-red-700 hover:bg-red-800  text-white rounded-full text-center">
                    <div class="mt-1.5">
                        <a href="#"><span class=" text-xl pt-8"><i class="fa-brands fa-youtube"></i></span></a>
                    </div>
                 </div>

             </div>
     </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer middle end-->

                        <!-- footer bottom -->
                        <div class=" bg_footer_3 py-4 text-gray-300">
                            <div class="container mx-auto text-center ">
                                    <p>কপিরাইট ২০২২ || <a href="#">লারা <span class=" text-lg">বাংলা</a></span></p>
                            </div>
                        </div>
                        <!-- footer bottom end-->

                </footer>
                <!-- footer end -->


            </div>
        </div>
    </div>
</body>

</html>
