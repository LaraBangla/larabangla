<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name='keywords' content='@yield('keywords','লারাভেল,বাংলা ডকুমেন্টেশন, লারাভেল বাংলা ডকুমেন্টেশন, লারাভেল বাংলা ডকুমেন্ট,লারাভেল ডকুমেন্টেশন, লারাভেল ডকুমেন্ট,ডকুমেন্টেশন,ডকুমেন্ট,ডকুমেনশন,এইচটিএমএল,সিএসএস,জেএস,বুটস্ট্যাপ,টেলউইন্ড সিএসএস,মেটেরিয়াল ডিজাইন,মেটেরেলাইজড ডিজাইন,মেটেরেলাইজড সিএসএস,ওয়েব সাইট,laravel,bangla documentation,bangla document,laravel documentation,laravel document,documentation,document,html,css,js,bootstrap,meterial design,meterilize design,meterilize css,website')'>
  <meta name='description' content='@yield('description','')'>
  <meta name='subject' content='@yield('title','টেকনোলজি ডকুমেন্টেশন ওয়েব সাইট')'>
  <meta name='copyright' content='LaraBangla'>
  <meta name='language' content='BD'>
  <meta name='topic' content='টেকনোলজি ডকুমেন্টেশন'>
  <meta name='summary' content='@yield('description','')'>
  <meta name='author' content='LaraBangla, info@larabangla.com'>
  <meta name='designer' content='লারা বাংলা - LaraBangla'>
  <meta name='owner' content='লারা বাংলা - LaraBangla'>
  <meta name='url' content='@yield('that_url','https://www.larabangla.com')'>
  <meta name='identifier-URL' content='@yield('that_url','https://www.larabangla.com')'>
  <meta name='pagename' content='@yield('pagename','বাড়ি পেজ,Home Page')'>
  <meta name='category' content='@yield('category','টেকনোলজি ডকুমেন্টেশন')'>
  <meta name='coverage' content='Worldwide'>
  <meta name='distribution' content='Global'>
  <meta name='subtitle' content='@yield('title','লারা বাংলা - ফ্রি অনলাইন ডকুমেন্টেশন ওয়েব সাইট')'>
  <meta name='target' content='all'>
  <meta name='HandheldFriendly' content='True'>

  <meta name='og:title' content='@yield('title','লারা বাংলা - ফ্রি অনলাইন ডকুমেন্টেশন ওয়েব সাইট')'>
  <meta name='og:type' content='Documentation,ডকুমেন্টেশন'>
  <meta name='og:url' content='@yield('that_url','https://www.larabangla.com')'>
  <meta name='og:image' content='@yield('image','www.larabangla.com/img/logo.png')'>
  <meta name='og:site_name' content='লারা বাংলা - LaraBangla'>
  <meta name='og:description' content='@yield('description','')'>

  <meta name='fb:page_id' content='100088381790920'>
  <meta name='application-name' content='LaraBangla'>
  <meta name='og:email' content='info@larabangla.com'>
  <meta name='og:region' content='BD'>
  <meta name='og:country-name' content='BD'>

  <meta name="google-analytics" content="@yield('description','') " />
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="twitter:url" content="@yield('that_url','https://www.larabangla.com')'">
  <meta name="twitter:title" content="@yield('title','লারা বাংলা - ফ্রি অনলাইন ডকুমেন্টেশন ওয়েব সাইট')">
  <meta name="twitter:description" content="@yield('description','')">
  <meta name="twitter:image" content="@yield('image','www.larabangla.com/img/logo.png')'">
  <meta name="twitter:image:alt" content="@yield('title','লারা বাংলা - ফ্রি অনলাইন ডকুমেন্টেশন ওয়েব সাইট')">

  <meta itemprop="name" content="লারা বাংলা - LaraBangla">
  <meta itemprop="image" content="@yield('image','www.larabangla.com/img/logo.png')'">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta name="x5-orientation" content="landscape/portrait">
  <meta name="x5-fullscreen" content="true">
  <meta name="x5-page-mode" content="app">
  <meta name="screen-orientation" content="landscape/portrait">
  <meta name="full-screen" content="yes">
  <meta name="imagemode" content="force">
  <meta name="browsermode" content="application">
  <meta name="nightmode" content="disable">
  <meta name="layoutmode" content="fitscreen">

  @notifyCss
  @vite('resources/css/app.css')
  <script src="https://kit.fontawesome.com/45ee9bbd89.js" crossorigin="anonymous"></script>
  <!-- Alpine collapse Plugins -->
  <script src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
  <script src="//unpkg.com/alpinejs"></script>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="{{ asset('css/prism.css') }}" rel="stylesheet" data-turbolinks-eval="false" data-turbo-eval="false">
  @livewireStyles
  @stack('style')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NEQ21J8TWK"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
  
      gtag('config', 'G-NEQ21J8TWK');
    </script>
  <title>@yield('title','লারা বাংলা - ফ্রি অনলাইন ডকুমেন্টেশন ওয়েব সাইট')</title>
</head>

<body class="bg-gray-50">
  <div @if (Request::route()->getName() == 'docs') {{-- default mobile menu is open --}}
            x-data="{ open: true }"
            {{-- if mobile menu is less than 767 then hide mobile menu --}}
            x-if="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            if (width < 767) {
            open = false
            }"
    @else
    x-data="{ open: false }" @endif
       {{-- if request route is not docs route then if screen size is bigger than 767 than hide mobile menu --}}
       @if (!Request::route()->getName() == 'docs') @resize.window="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if (width > 767) {
    open = false
    }"

    {{-- if request route is docs then execute --}}
    @elseif (Request::route()->getName() == 'docs')
        {{-- if screen size is bigger than 767 then auto show mobile docs menu else hide mobile docs menu --}}
        @resize.window="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if (width > 767) {
        open = true
        }
        else{
            open = false
        }" @endif>
    <div class="


    @if (Request::route()->getName() == '/')
    bg-gray-900
    border-b  border-slate-600
    @else
    bg-gray-200
    @endif
     shadow-md" x-data="{ tutorial: false }">

      <div>
        <!-- class="container" -->
        <!-- <div class="float-left pt-5 pl-3 sm:pt-7">
                <a class="text-2xl font-bold" href="#">Lara Bangla</a>
            </div> -->
        <ul class="mr-4 flex justify-end py-6 " x-data="{ user: false }">
          <li><a class="pl-5 text-2xl font-bold text-gray-600 " href="{{ route('/') }}">
            {{-- লারা <span class="text-3xl">বাংলা</span> --}}
            <img src="{{ asset('img/logo.png') }}"  class="ml-8 -mt-9" width="60" alt="LaraBangla Logo">
          </a></li>
          <li class="grow"></li>
          <li class="mx-1 hidden bg-gray-300 px-2 py-3 text-gray-600 duration-500 md:block lg:px-5"><a class="font-bold" href="{{ route('/') }}"><i
                 class="fa fa-home"></i> বাড়ি</a></li>
          <li class="mx-1 hidden px-2 py-3 text-gray-600 duration-500 hover:bg-gray-300 md:block lg:px-5" @click="tutorial = ! tutorial"><a
               class="font-bold" href="#">ডকুমেন্টেশন <i class="fa-solid fa-caret-down"></i></a></li>
          {{-- <li class="mx-1 hidden px-2 py-3 text-gray-600 duration-500 hover:bg-gray-300 md:block lg:px-5"><a class="font-bold"
               href="#">সার্ভিস</a></li>
          <li class="mx-1 hidden px-2 py-3 text-gray-600 duration-500 hover:bg-gray-300 md:block lg:px-5"><a class="font-bold" href="#">ব্লগ</a>
          </li> --}}
          <li class="mx-1 hidden px-2 py-3 text-gray-600 duration-500 hover:bg-gray-300 md:block lg:px-5"><a class="font-bold"
               href="{{ route('about.us') }}">সম্পর্কে</a></li>
          <li class="mx-1 hidden px-2 py-3 text-gray-600 duration-500 hover:bg-gray-300 md:block lg:px-5"><a class="font-bold"
               href="{{ route('contact') }}">যোগাযোগ</a></li>

          <li class="mx-1 hidden px-2 py-3 text-gray-600 duration-500 md:block" x-data="{ doc_search: false }">
            <a class="font-bold" @click="doc_search = ! doc_search"><span class="text-xl"><i class="fa-solid fa-magnifying-glass"></i></span></a>
      {{-- desktop search body start --}}
    <div class="fixed top-0  right-0 h-screen w-screen duration-200 z-20" style=" background:rgba(5, 5, 5, 0.685);" x-show="doc_search"
      x-transition:enter="transition ml-2 duration-200" x-transition:enter-start="opacity-0 scale-50"
      x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
      x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
 <div class="mt-10" @click.outside="doc_search = false">
  <div class="md:mx-40 lg:mx-52 xl:mx-60 2xl:mx-72 bg-gray-900 pt-3">
    <div class="px-3">
      <div class="flex justify-end">
        <div @click="doc_search = false">
          <div class="text-left text-gray-400"><span><i class="fa-solid fa-xmark"></i></span></div>
        </div>
      </div>
      {{-- search input --}}
      <div class="flex border-b border-gray-500 pb-1">
        <div class="mr-3">
          <span class="text-lg text-gray-400"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>
        <div class=" w-full">
          <input class="bg-gray-900 w-full text-gray-200  border-transparent focus:border-0 focus:ring-0" type="text" placeholder="ডক অনুসন্ধান">
        </div>
      </div>
      {{-- desktop search instraction --}}
      <div class="px-5 pt-6 pb-10">
        <p class="text-sm text-gray-400">
          ডকুমেন্টেশনে ফলাফল খুঁজে পেতে একটি অনুসন্ধান শব্দ লিখুন।
        </p>
      </div>
      {{-- search footer --}}
      <div class="border-t border-black pb-2 pt-1 text-right">
        <span class="text-sm text-gray-400"><span>লারা</span><span class="text-base"> বাংলা</span></span>
      </div>
    </div>
  </div>
 </div>
 </div>
 {{-- search body end --}}

          </li>
          <li class="mx-1 hidden px-3 py-3 text-gray-600 duration-500 md:block" @click="user = ! user" @click.outside="user=false"><a
            class="font-bold"><i class="fa-solid fa-user"></i></a>
         <div class="absolute right-2 mt-2 rounded border bg-slate-50" x-show="user">
           <ul class="py-5">
            @guest
            <li class="rounded-sm py-2 px-5 font-semibold hover:bg-slate-100"><a href="{{ route('login') }}"><span class="text-gray-500"><i
              class="fa fa-sign-in mr-2"></i></span>লগিন</a></li>

              <li class="rounded-sm py-2 px-5 font-semibold hover:bg-slate-100"><a href="{{ route('register') }}"><span class="text-gray-500"><i
                class="fa-solid fa-user-plus mr-2"></i></span>রেজিস্টার</a></li>


            @else
            <li class="rounded-sm py-2 px-5 font-semibold hover:bg-slate-100"><a href="{{ route('profile.show') }}"><span class="text-gray-500"><i
              class="fa-solid fa-user mr-2"></i></span>প্রফাইল</a></li>
            <li class="rounded-sm py-2 px-5 font-semibold hover:bg-slate-100">
                 <!-- Authentication -->
                 <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf

                  <a href="{{ route('logout') }}"
                           @click.prevent="$root.submit();">
                           <span class="text-gray-500"><i class="fa fa-sign-in mr-2"></i> লগ আউট</span>
                  </a>
              </form>
            </li>
            @endguest


           </ul>
         </div>
       </li>
          <li class="mx-1 hidden py-3 text-gray-600 duration-500 md:block" x-data="{ option: false }">
            <a class="px-2 font-bold" @click="option = ! option" @click.outside="option=false"><span class="text-xl"><i
                   class="fa fa-ellipsis-v"></i></span>
            </a>
            <!-- options -->
            <div class="absolute right-2 mt-2 rounded border bg-slate-50 z-20" x-show="option">
              <ul class="py-5">
                @guest
                <li class="rounded-sm py-2 px-5 font-baseline hover:bg-slate-100"><a href="{{ route('online.course') }}">
                  <span class="text-gray-500"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;</span>অনলাইন কোর্স</a>
                </li>
                <li class="rounded-sm py-2 px-5 font-baseline hover:bg-slate-100"><a href="{{ route('web.design.and.development') }}">
                  <span class="text-gray-500"><i class="fa-brands fa-dev"></i>&nbsp;&nbsp;</span>ওয়েব ডেভেলপমেন্ট</a></li>
                </li>
                <li class="rounded-sm py-2 px-5 font-baseline hover:bg-slate-100"><a href="{{ route('apps.development') }}">
                  <span class="text-gray-500"><i class="fa-solid fa-mobile"></i>&nbsp;&nbsp;</span>অ্যাপস ডেভেলপমেন্ট</a></li>
                </li>
                <li class="rounded-sm py-2 px-5 font-baseline hover:bg-slate-100"><a href="{{ route('software.development') }}">
                  <span class="text-gray-500"><i class="fa-solid fa-desktop"></i>&nbsp;&nbsp;</span>সফটওয়্যার ডেভেলপমেন্ট</a></li>
                </li>

                @else
                <li class="rounded-sm py-2 px-5 font-semibold hover:bg-slate-100"><a href="{{ route('profile.show') }}"><span class="text-gray-500"><i
                  class="fa fa-sign-in mr-2"></i></span>একাউন্ট</a></li>
                <li class="rounded-sm py-2 px-5 font-semibold hover:bg-slate-100"><a href="{{ route('profile.show') }}"><span class="text-gray-500">
                <i class="fa-solid fa-gear"></i> </span>সেটিংস</a></li>
                @endguest

              </ul>
            </div>
          </li>
          <div class="float-left text-4xl text-gray-600 md:hidden" @click="open = ! open">
            <i class="fa fa-bars"></i>
          </div>
        </ul>
        {{-- tutorial menu start --}}
        <div class="absolute z-20 w-screen bg-slate-100 shadow-xl" x-show="tutorial" @click.outside="tutorial=false">
          <div class="container mx-auto">
            <div class="grid grid-cols-12 gap-6 py-5">

              @foreach ($boot_tech_division as $division)
                <div class="col-span-3">
                  <h6 class="border-b border-gray-500 pb-1 text-xl font-bold text-gray-700">{{ $division->name }}</h6>
                  <div class="pt-3 leading-9">
                    <ul>
                      @foreach ($division->technologies as $technology)
                        @php
                            $find_lesson = App\Models\Frontend\Technology\Lesson::whereTechnology_id($technology->id)->select('id','slug')->first();
                        @endphp
                        @isset($find_lesson)
                        <li class="duration-300 hover:rounded-sm hover:bg-gray-200 hover:pl-3 hover:shadow-md"><a
                            href="{{ route('send.to.docs', ['technology_slug' => $technology->slug]) }}">{{ $technology->name }}</a>
                       </li>
                       @endisset

                      @endforeach

                    </ul>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
        </div>
        {{-- tutorial menu end --}}
      </div>
    </div>



    <div class="@if (Request::route()->getName() == 'docs') md:flex @endif w-screen">
      {{-- mobile menu start --}}
      <div class="@if (!Request::route()->getName() == 'docs') absolute top-0 left-0
            @else
            absolute md:static top-0 left-0 @endif @if (!Request::route()->getName() == 'docs') bg-gray-100
            h-screen
            @else
            rounded-r-md
            bg-gray-100  md:border-r-2 md:border-r-gray-200 md:mt-1 @endif z-10 w-1/2 duration-700 md:w-2/12"
           x-show="open" x-transition:enter="transition ml-2 duration-300" x-transition:enter-start="opacity-0 scale-50"
           x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
           x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" {{-- if the page is not docs page then hide mobile menu on click outside of mobile menu. --}}
           @if (!Request::route()->getName() == 'docs') @click.outside="open=false"
                @else
                    {{-- if it is docs page then, if the page size is less than 767 then hide mobile menu on click outside of mobile menu --}}
                    @click.outside="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                    if (width < 767) {
                    open = false
                    }" @endif>
        @if (!Request::route()->getName() == 'docs')
          <div class="border-b p-5 text-center text-gray-600">
            <a class="font-bold" href="#">
              <!-- <img class="mx-auto block pt-5" src="src/img/logo.png" alt="" width="70"> -->
              <span class=""><span class="text-2xl">লারা</span>&nbsp;&nbsp;<span class="text-3xl">বাংলা</span></span>
              <p class="pr-4 text-right text-xs font-normal">এবার শিখা হোক বাংলায়</p>
            </a>
          </div>
        @endif

        <div class="pl-4 pb-2 min-h-screen

        @if (Request::route()->getName() == '/')
        bg-slate-800
        @endif
        ">
          <ul class="pt-6">

            {{-- @if (Request::route()->getName() == '/' || Request::route()->getName() == 'profile.show' || Request::route()->getName() == 'login' || Request::route()->getName() == 'register')
              <li class="py-3 pl-3 text-base font-semibold text-gray-600"><a href="{{ route('/') }}"><span class="text-xl text-gray-500"><i
                       class="fa fa-home mr-4"></i></span>বাড়ি</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-600"><a href="#"><span class="text-xl text-gray-500"><i
                       class="fa-solid fa-book-open-reader mr-4"></i></span>ডকুমেন্টেশন</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-600"><a href="#"><span class="text-xl text-gray-500"><i
                       class="fa-solid fa-fan mr-4"></i></span>সার্ভিস</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-600"><a href="#"><span class="text-xl text-gray-500"><i
                       class="fa-solid fa-blog mr-4"></i></span>ব্লগ</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-600"><a  href="{{ route('about.us') }}"> <span class="text-xl text-gray-500"><i
                       class="fa fa-info-circle mr-4"></i></span>সম্পর্কে</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-600"><a href="{{ route('contact') }}"><span class="text-xl text-gray-500"><i
                       class="fa-solid fa-address-book mr-4"></i></span>যোগাযোগ</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-600"><a href="#"> <span class="text-xl text-gray-500"><i
                       class="fa fa-sign-in mr-4"></i></span>লগিন</a></li>
            @else
              @include('frontend.more.doc_sidebar')
            @endif --}}

            @if (Request::route()->getName() == 'docs')
              @include('frontend.more.doc_sidebar')
            @else
            {{-- mobile menu navigation --}}
              <li class="pt-3 pl-1 text-base font-semibold text-gray-400 mb-3 border-b border-b-slate-600"><a href="{{ route('/') }}"><img class="" src="{{ asset('img/logo.png') }}" alt="LaraBangla Logo" width="45"><span class=" text-gray-500 text-sm">লারা বাংলা</span></a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-400"><a href="{{ route('/') }}"><span class="text-xl"><i
                class="fa fa-home mr-4"></i></span>বাড়ি</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-400"><a href="#"><span class="text-xl"><i
                        class="fa-solid fa-book-open-reader mr-4"></i></span>ডকুমেন্টেশন</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-400"><a href="#"><span class="text-xl"><i
                        class="fa-solid fa-fan mr-4"></i></span>সার্ভিস</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-400"><a href="#"><span class="text-xl"><i
                        class="fa-solid fa-blog mr-4"></i></span>ব্লগ</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-400"><a  href="{{ route('about.us') }}"> <span class="text-x"><i
                        class="fa fa-info-circle mr-4"></i></span>সম্পর্কে</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-400"><a href="{{ route('contact') }}"><span class="text-x"><i
                        class="fa-solid fa-address-book mr-4"></i></span>যোগাযোগ</a></li>
              <li class="py-3 pl-3 text-base font-semibold text-gray-400"><a href="{{ route('login') }}"> <span class="text-xl"><i
                        class="fa fa-sign-in mr-4"></i></span>লগিন</a></li>
            @endif

          </ul>
        </div>
        {{-- <div class="pt-5 pl-5">
                    <div class=" border-b pb-3">
                        <span class=" font-semibold text-xl text-gray-600">Services</span>

                    </div>
                    <ul class="pt-4">
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa fa-home mr-4 "></i></span>Home</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a href="#"><span class=" text-xl text-gray-500"><i class="fa-solid fa-blog mr-4 "></i></span>Blog</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600"><a  href="{{ route('about.us') }}"><span class=" text-xl text-gray-500"><i class="fa-solid fa-users mr-4 "></i></span>Team</a></li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600">
                            <a href="#"> <span class="text-xl text-gray-500"><i class="fa fa-info-circle mr-4 "></i></span>সম্পর্কে</a>
                        </li>
                        <li class="py-3 pl-3 font-semibold text-base text-gray-600">
                            <a href="#"> <span class="text-xl text-gray-500"><i class="fa fa-sign-in mr-4 "></i></span>Login</a>
                        </li>
                    </ul>
                </div> --}}
      </div>
      {{-- mobile menu end --}}
      <!-- body section -->
      <div>

        {{-- notify 2 message --}}
        <x:notify-messages />

        <section>
          @if (Request::route()->getName() == 'profile.show')
            <main>
            {{ $slot }}
          </main>
          @endif

          @yield('content')
        </section>

        {{-- right side fixed menu --}}
        <div class="fixed top-56 right-3 z-10 -ml-9 hidden duration-700 md:block">
          <ul>
            <li class="mt-2 h-10 w-10 border border-gray-100 bg-white pt-2 text-center"><a href="https://www.facebook.com/LaraBangla" target="_blank"><i
                   class="fa-brands fa-facebook-f"></i></a></li>
            <li class="mt-2 h-10 w-10 border border-gray-100 bg-white pt-2 text-center"><a href="https://twitter.com/LaraBangla" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            </li>
            <li class="mt-2 h-10 w-10 border border-gray-100 bg-white pt-2 text-center"><a href="#" target="_blank"><i
                   class="fa-brands fa-instagram"></i></a></li>
            <li class="mt-2 h-10 w-10 border border-gray-100 bg-white pt-2 text-center"><a href="https://www.youtube.com/@Larabangla" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </li>
          </ul>
        </div>
        {{-- right side fixed menu end --}}

        <!-- bottom bar  floating action button -->
        <div x-data="{ expanded: false }">
          {{-- items --}}
          <div class="fixed bottom-52 right-3 z-10 -ml-9" x-show="expanded " x-collapse @click.outside="expanded =false">
            <ul class="text-gray-600">
              <li class="mt-3 h-14 w-32 rounded-t-lg border border-gray-200 bg-gray-50 pt-3"><a href="#">
                  <div class="pl-3">
                    <span class="text-2xl"><i class="fa-solid fa-newspaper"></i></span>
                    <span class="ml-2">News</span>
                </a>
          </div>
          </li>
          <li class="mt-3 h-14 w-32 rounded-t-lg border border-gray-200 bg-gray-50 pt-3"><a href="#">
              <div class="pl-3">
                <span class="text-2xl"><i class="fa-solid fa-blog"></i></span>
                <span class="ml-2">Blog</span>
            </a>
        </div>
        </li>
        <li class="mt-3 h-14 w-32 rounded-t-lg border border-gray-200 bg-gray-50 pt-3"><a href="#">
            <div class="pl-3">
              <span class="text-2xl"><i class="fa-solid fa-chalkboard-user"></i></span>
              <span class="ml-2">Tutorials</span>
          </a>
      </div>
      </li>
      <li class="mt-3 h-14 w-32 rounded-t-lg border border-gray-200 bg-gray-50 pt-3"><a href="#">
          <div class="pl-3">
            <span class="text-2xl"><i class="fa-regular fa-handshake"></i></span>
            <span class="ml-2">Services</span>
        </a>
    </div>
    </li>
    </ul>
  </div>
  {{-- items end floting button--}}
  <div class="fixed bottom-28 right-3 z-10 -ml-9 h-20 w-20 rounded-full border border-gray-100 bg-gray-50 shadow-lg duration-700"
       @click="expanded  = !expanded" @if (!Request::route()->getName() == 'docs') :class="open ? 'blur-sm' : ''" @endif>
    <div class="mt-6 text-center text-2xl font-black text-gray-600">
      <span class="text-center"><i class="fa-solid fa-plus"></i></span>
    </div>
  </div>

  <div class="fixed bottom-0 w-screen rounded-lg border border-gray-300 bg-slate-100 duration-700 md:hidden pt-1 z-10"
       @if (!Request::route()->getName() == 'docs') :class="open ? 'blur-sm' : ''" @endif>
    <ul class="flex justify-around text-center">
      <li class="px-4 py-4 font-bold text-gray-600"><a href="#">
        <span class="text-xl"><i class="fa-solid fa-book mr-2"></i></span>
        @if (Request::route()->getName() == 'docs')
        <p>ডকস</p>
      @endif
      </a>

      </li>
      <li class="px-4 py-4 font-bold text-gray-600">
        <a href="{{ route('/') }}"><span class="text-xl"><i class="fa fa-home mr-2"></i></span>
          @if (Request::route()->getName() == '/')
          <p>বাড়ি</p>
           @endif
        </a>

      </li>
      <!-- <li class="px-4 py-4 font-bold text-gray-600"></li> -->
      <li class="px-4 py-4 font-bold text-gray-600 "><a href="#"><span class="text-xl"><i class="fa-solid fa-user mr-2"></i></span>
        @if (Request::route()->getName() == 'profile')
        <p>ইউজার</p>
         @endif
      </a>

      </li>
    </ul>
  </div>
  </div>

  </div>
  </div>

  <!-- footer start -->
  <footer class="duration-700" @if (!Request::route()->getName() == 'docs') :class="open ? 'blur-sm' : ''" @endif>
    <!-- footer top and middle -->
    <div class="bg_footer_2 pt-20 leading-7
    @if (Request::route()->getName() != '/')
        mt-24
    @endif
    text-gray-300   relative" >
      {{-- footer top --}}
      <div class="bg-gradient-to-r from-slate-700 via-gray-700 to-slate-500 shadow-lg shadow-slate-400/50 h-40 sm:h-32 sm:rounded-md -mt-36   overflow-visible absolute md:w-4/5 w-full md:mx-20p">
        <div class="my-7 ml-10 mr-5 sm:flex sm:justify-between">
          <div>
            <p class=" text-base sm:text-xl font-medium">আজকেই শুরু করা যাক</p>
            <div class="mt-3">
              <span class="text-sm sm:text-base"> <i class="fa-solid fa-check-to-slot"></i> বাংলা ভাষা</span>
              <span class="text-sm sm:text-base md:ml-3"><i class="fa-solid fa-check-to-slot"></i> ডকুমেন্টেশন</span>
              <span class="text-sm sm:text-base md:ml-3"> <i class="fa-solid fa-check-to-slot"></i> রিসোর্স</span>
            </div>
          </div>
          <div>
            <div class="mt-5">
              @guest
              <a href="{{ route('register') }}" class="py-1 sm:py-3 px-1 sm:px-4 md:mr-2 bg-gray-800 sm:bg-slate-700 hover:bg-slate-800 rounded-sm sm:rounded-full">ফ্রি রেজিস্টার &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
              @else
              <a href="{{ route('send.to.docs',['technology_slug'=>'laravel']) }}" class="py-1 sm:py-3 px-1 sm:px-4 md:mr-2 bg-gray-800 sm:bg-slate-700 hover:bg-slate-800 rounded-sm sm:rounded-full">ডকুমেন্টেশন &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
              @endguest
              <a href="{{ route('contact') }}" class="py-1 sm:py-3 px-2 sm:px-5 bg-gray-800 sm:bg-slate-700 rounded-sm hover:bg-slate-800 sm:rounded-full  sm:mt-0">যোগাযোগ &nbsp;&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      {{-- footer top end --}}

      <div class="container mx-auto text-gray-400 pl-5 md:pl-0 pt-4 md:mt-0">
        <div class="grid grid-cols-12 gap-4 py-5">
          <div class="col-span-12 md:col-span-3">
            <h6 class="border-b border-gray-700"><span class="text-2xl font-semibold">লারা </span><span class="text-3xl font-bold">বাংলা</span></h6>
            <span class=" text-amber-700">ওয়েবসাইট টি নির্মানাধীন রয়েছে</span>
            <ul class="pt-2">
              <li><a href="#"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;বাড়ি</a></li>
              <li><a href="{{ route('send.to.docs',['technology_slug'=>'laravel']) }}"><i class="fa-regular fa-snowflake"></i>&nbsp;&nbsp;লারাভেল</a></li>
              <li><a href="{{ route('splade') }}"><i class="fa-regular fa-snowflake"></i>&nbsp;&nbsp;স্প্লেড</a></li>
              <li><a href="{{ route('livewire') }}"><i class="fa-regular fa-snowflake"></i>&nbsp;&nbsp;লাইভ ওয়্যার</a></li>
            </ul>
          </div>
          <div class="col-span-12 md:col-span-3">
            <h6 class="border-b border-gray-700 pb-1"><span class="text-2xl">তথ্য </span></h6>
            <ul class="pt-2">
              <li><a href="{{ route('about.us') }}"><i class="fa-solid fa-circle-info"></i>&nbsp;&nbsp;আমাদের সম্পর্কে</a></li>
              <li><a href="{{ route('contact') }}"><i class="fa-solid fa-message"></i>&nbsp;&nbsp;যোগাযোগ করুন</a></li>
              <li><a href="{{ route('blog') }}"><i class="fa-solid fa-blog"></i>&nbsp;&nbsp;ব্লগ</a></li>
              <li><a href="{{ route('forum') }}"><i class="fa fa-group"></i>&nbsp;&nbsp;ফোরাম</a></li>
            </ul>
          </div>
          <div class="col-span-12 md:col-span-3">
            <h6 class="border-b border-gray-700 pb-1"><span class="text-2xl">গুরুত্বপূর্ণ লিংকস </span></h6>
            <ul class="pt-2">
              <li><a href="{{ route('profile.show') }}"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;একাউন্ট</a></li>
              <li><a href="#"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;ডকুমেন্টেশন</a></li>
              <li><a href="{{ route('community') }}"><i class="fa fa-group"></i>&nbsp;&nbsp;কমিউনিটি</a></li>
              <li><a href="{{ route('profile.show') }}"><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;সেটিংস</a></li>
            </ul>
          </div>
          <div class="col-span-12 md:col-span-3">
            <h6 class="border-b border-gray-700 pb-1"><span class="text-2xl">আমাদের সম্পর্কে </span></h6>
            <p class="pt-3">
              বাংলা ভাষায় প্রযুক্তিগত ডকুমেন্টেশনের একটি শীর্ষস্থানীয় ডকুমেন্টেশন প্রদানকারী "লারা বাংলা"-এ স্বাগতম।
               আমাদের অভিজ্ঞ প্রযুক্তিগত লেখক এবং সম্পাদকদের দলটি ব্যবহারকারীদের মাতৃভাষা বাংলায় সর্বাধুনিক প্রযুক্তিগুলি বুঝতে এবং ব্যবহার করতে সহায়তা করার জন্য নিবেদিত ।
            </p>
          </div>

          <div class="col-span-12 md:col-span-3 md:pt-8">
            <h6 class="border-b border-gray-700 pb-1"><span class="text-2xl">সমর্থন </span></h6>
            <ul class="pt-2">
              <li><a href="{{ route('question') }}"><i class="fa-solid fa-circle-question"></i>&nbsp;&nbsp;প্রশ্ন</a></li>
              <li><a href="{{ route('help') }}"><i class="fa-solid fa-handshake-angle"></i>&nbsp;&nbsp;সাহায্য</a></li>
              <li><a href="{{ route('sitemap') }}"><i class="fa-solid fa-sitemap"></i>&nbsp;&nbsp;সাইটম্যাপ</a></li>
            </ul>
          </div>

          <div class="col-span-12 md:col-span-3 md:pt-8">
            <h6 class="border-b border-gray-700 pb-1"><span class="text-2xl">আইনি </span></h6>
            <ul class="pt-2">
              <li><a href="#"><i class="fa-regular fa-snowflake"></i>&nbsp;&nbsp;গোপনীয়তা নীতি</a></li>
              <li><a href="#"><i class="fa-regular fa-snowflake"></i>&nbsp;&nbsp;শর্তাবলী</a></li>
              <li><a href="#"><i class="fa-regular fa-snowflake"></i>&nbsp;&nbsp;ব্যবহারের শর্তাবলী</a></li>
              <li><a href="#"><i class="fa-solid fa-copyright"></i>&nbsp;&nbsp;কপিরাইট</a></li>

            </ul>
          </div>

          <div class="col-span-12 md:col-span-3 md:pt-8">
            <h6 class="border-b border-gray-700 pb-1"><span class="text-2xl">সেবা সমূহ </span></h6>
            <ul class="pt-2">
              <li><a href="{{ route('online.course') }}"><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;অনলাইন কোর্স <span
                        class="rounded-full bg-yellow-600 px-2 text-xs text-black">রেজিস্ট্রেশন করুন</span></a></li>
              <li><a href="{{ route('web.design.and.development') }}"><i class="fa-brands fa-dev"></i>&nbsp;&nbsp;ওয়েব ডিজাইন এবং ডেভেলপমেন্ট</a></li>
              <li><a href="{{ route('apps.development') }}"><i class="fa-solid fa-mobile"></i>&nbsp;&nbsp;অ্যাপস ডেভেলপমেন্ট</a></li>
              <li><a href="{{ route('software.development') }}"><i class="fa-solid fa-desktop"></i>&nbsp;&nbsp;সফটওয়্যার ডেভেলপমেন্ট</a></li>
            </ul>
          </div>

          <div class="col-span-12 pb-5 md:col-span-3 md:pt-8 md:pb-0">
            <h6 class="border-b border-gray-700 pb-1"><span class="text-2xl">আমাদের অনুসরণ করুন </span></h6>
            <div class="flex items-center gap-3 pt-4">
              <div class="h-10 w-10 rounded-full bg-blue-800 text-center text-white duration-300 hover:bg-blue-900">
                <div class="mt-2">
                  <a href="https://www.facebook.com/LaraBangla" target="_blank"><span class="pt-8 text-xl"><i class="fa-brands fa-facebook-f"></i></span></a>
                </div>
              </div>

              <div class="h-10 w-10 rounded-full bg-sky-500 text-center text-gray-200 duration-300 hover:bg-sky-600">
                <div class="mt-2">
                  <a href="https://twitter.com/LaraBangla" target="_blank"><span class="pt-8 text-xl"><i class="fa-brands fa-twitter"></i></span></a>
                </div>
              </div>

              <div class="h-10 w-10 rounded-full bg-pink-700 text-center text-white duration-300 hover:bg-pink-800">
                <div class="mt-1.5">
                  <a href="#"><span class="pt-8 text-xl"><i class="fa-brands fa-instagram"></i></i></span></a>
                </div>
              </div>

              <div class="h-10 w-10 rounded-full bg-red-700 text-center text-white duration-300 hover:bg-red-800">
                <div class="mt-1.5">
                  <a href="https://www.youtube.com/@Larabangla" target="_blank"><span class="pt-8 text-xl"><i class="fa-brands fa-youtube"></i></span></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer middle end-->
    <!-- footer bottom -->
    <div class=" bg_footer_3 py-4 text-gray-400">
      <div class="container mx-auto text-center">
        <p>কপিরাইট ২০২২ - {{ $present_year }} || <a href="#">লারা <span class="text-lg">বাংলা</a></span></p>
      </div>
    </div>
    <!-- footer bottom end-->
  </footer>
  <!-- footer end -->

  </div>

  {{-- hotwire turbo start --}}
  <script data-turbolinks-eval="false" data-turbo-eval="false" type="module">
            import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo'
        </script>
  <script data-turbolinks-eval="false" data-turbo-eval="false">
    Turbo.setProgressBarDelay(1000)
  </script>
  <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false">
  </script>

<script src="{{ asset('js/prism.js') }}" data-turbolinks-eval="false" data-turbo-eval="false"></script>
  {{-- hotwire turbo ends --}}
  @notifyJs
  {{-- jetstream modals --}}
  @stack('modals')
  @stack('scripts')
  @livewireScripts

  @include('frontend.more.top-to-bottom')


</body>

</html>
