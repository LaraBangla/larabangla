<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
        <script src="https://kit.fontawesome.com/45ee9bbd89.js" crossorigin="anonymous"></script>
        <!-- Alpine collapse Plugins -->
        <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100;200;300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
        @stack('style')
        <title>{{$title ?? 'Dashboard'}}</title>
</head>

<body class=" bg-gray-50">

    <section>
    <div x-data="{ sidebar: true }"
    x-if="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if (width < 767) {
        sidebar = false
    }"
          {{-- if screen size is bigger than 767 then auto show mobile docs menu else hide mobile docs menu --}}
          @resize.window="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
          if (width > 767) {
          sidebar = true
          }
          else{
              sidebar = false
          }"
    >
        <div class="flex">
            <div class=" w-96 md:w-60 h-screen bg-slate-200 border-r border-gray-300 duration-500" x-show="sidebar" x-transition>
                <div class="text-center pt-6 pb-6 border-b border-gray-300">
                    <a href="{{ route('admin.dashboard') }}" class=" text-gray-600 text-xl font-bold" href="#">Dashboard</a>
                </div>

                <div>
                    <div class=" leading-7 cursor-pointer">
                        <ul class=" text-gray-700 pl-2">
                            <li class=" border-b  border-gray-300 pt-4 pb-1 mb-2">
                                <div class=" flex items-center mb-2">
                                    <div>
                                        <img class=" rounded-full w-8 h-8 ring-2 ring-slate-400" src="https://ui-avatars.com/api/?name=Anowar+Hosen&background=0000&color=fff" alt="avtar">
                                    </div>
                                    <div class=" pl-2">
                                        <a href="#" class=" font-medium">Anowar Hosen</a>
                                    </div>
                                </div>
                            </li>
                            <li class=" hover:bg-gray-300 pl-2 rounded font-semibold"><a href="{{ route('/') }}" ><span><i class="fa-solid fa-globe"></i></span> Visite website</a></li>
                            <li class="mt-1" x-data="{open: false}" >
                                <div class=" hover:bg-gray-300 pl-2 rounded"  @click="open = ! open">
                                    <a  class=" font-semibold"><span><i class="fa-regular fa-folder"></i></span> Tech Devision<span><i class="fa-solid fa-caret-down"></i></span></a>
                                </div>

                                <ul x-show="open" x-collapse.duration.300ms>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="#"><span><i class="fa-regular fa-circle"></i></span> All Division</a></li>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="{{ route('admin.add.division') }}"><span><i class="fa-regular fa-circle"></i></span> Add Division</a></li>
                                </ul>
                            </li>
                            <li class="mt-1" x-data="{open: false}" >
                                <div class=" hover:bg-gray-300 pl-2 rounded"  @click="open = ! open">
                                    <a  class=" font-semibold"><span><i class="fa-regular fa-folder"></i></span> Technology <span><i class="fa-solid fa-caret-down"></i></span></a>
                                </div>

                                <ul x-show="open" x-collapse.duration.300ms>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="#"><span><i class="fa-regular fa-circle"></i></span> All Technology</a></li>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="{{ route('admin.add.technology') }}"><span><i class="fa-regular fa-circle"></i></span> Add Category</a></li>
                                </ul>
                            </li>
                            <li class="mt-1" x-data="{open: false}" >
                                <div class=" hover:bg-gray-300 pl-2 rounded"  @click="open = ! open">
                                    <a class=" font-semibold" ><span><i class="fa-regular fa-newspaper"></i></span> News <span><i class="fa-solid fa-caret-down"></i></span></a>
                                </div>

                                <ul x-show="open" x-collapse.duration.300ms>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="#"><span><i class="fa-regular fa-circle"></i></span> News Category</a></li>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="#"><span><i class="fa-regular fa-circle"></i></span> News Post</a></li>
                                </ul>
                            </li>
                            <li class="mt-1" x-data="{open: false}" >
                                <div class=" hover:bg-gray-300 pl-2 rounded"  @click="open = ! open">
                                    <a class=" font-semibold" ><span><i class="fa-solid fa-gear"></i></span> Settings <span><i class="fa-solid fa-caret-down"></i></span></a>
                                </div>

                                <ul x-show="open" x-collapse.duration.300ms>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="#"><span><i class="fa-regular fa-circle"></i></span> Header</a></li>
                                    <li class="pl-3 rounded hover:bg-gray-300 font-medium"><a href="#"><span><i class="fa-regular fa-circle"></i></span> Footer</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class=" w-screen">
                <div class="py-4 bg-gray-200">
                    <ul class="flex justify-end">
                        <li class="px-3 py-2 ml-8 " @click="sidebar =! sidebar" ><span><span class=" text-2xl text-gray-800"><i class="fa-solid fa-bars"></i></span></span></li>
                        <li class=" grow"></li>
                        <li class="px-3 mr-1 py-2 rounded-full"><a href="#"><span class=" text-xl"><i class="fa-regular fa-bell"></i></span> </a><span class=" mt-2 -ml-2 bg-yellow-500 text-gray-800 w-5 h-5 text-center absolute text-sm rounded-full">1</span></li>
                        <li class="px-3 py-1 mr-2"><img class=" rounded-full w-8 ring-2 ring-slate-400" src="https://ui-avatars.com/api/?name=Anowar+Hosen&background=0000&color=fff" alt=""></li>
                    </ul>
                </div>
                {{-- content --}}
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    </section>











    <script src="{{ asset('js/prism.js') }}"></script>
    {{-- hotwire turbo start --}}
    <script data-turbolinks-eval="false" data-turbo-eval="false" type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo'
        </script>
    <script data-turbolinks-eval="false" data-turbo-eval="false">
        Turbo.setProgressBarDelay(1000)

    </script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>

    {{-- hotwire turbo ends --}}
</body>

</html>
