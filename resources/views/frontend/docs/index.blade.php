@extends('frontend.header_footer')

@section('content')
<section class="docs" x-data="{ mobile_search: false }" >
    <div class="container mx-auto" >
        <div class="">
           <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 md:col-span-9">
                    <div class="mx-5 md:pl-10  md:pr-5 mt-8 leading-20" >
                    {{-- version start for mobile --}}
                   <div class=" md:hidden" x-data="{ doc_version: false }">

                    <div class="text-center pt-2 border-b pb-2 bg-slate-50" @click="doc_version =! doc_version">
                        <label class=" text-lg font-medium text-gray-600">Version<span class="ml-6"><i class="fa-solid fa-caret-down"></i></span></label>
                    </div>

                    <div class=" w-28 mx-auto  " x-show="doc_version" @click.outside="doc_version = false">
                        <ul class="bg-white absolute py-3 z-20 border rounded-b-md">
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">Master</span></a></li>
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">9.x</span></a></li>
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">8.x</span></a></li>
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">7.x</span></a></li>
                        </ul>
                    </div>
                </div>
                 {{-- version end for mobile --}}
                 {{-- search --}}
                    <div class="md:hidden mb-6">
                        <div class="mt-2 rounded-md mx-3"  @click="mobile_search =! mobile_search" >
                            <div class="flex py-3 bg-gray-100 rounded-md px-3">
                                <div>
                                    <span class=" text-xl font-thin text-gray-500 pr-4"><i class="fa-solid fa-magnifying-glass"></i></span>
                                </div>
                                <div>
                                    <span class=" text-lg text-gray-500">অনুসন্ধান</span>
                                </div>
                            </div>
                        </div>
                        {{-- search body start --}}
                        <div class=" fixed top-5 right-0 w-screen duration-200 "
                        x-show="mobile_search" @click.outside="mobile_search = false"
                        x-transition:enter="transition ml-2 duration-200" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        >
                            <div class=" pt-3 bg-gray-900  mx-4">
                                <div class="px-3">
                                    <div class="flex justify-end">
                                        <div @click="mobile_search = false">
                                            <div class=" text-gray-400 text-left"><span><i class="fa-solid fa-xmark"></i></span></div>
                                        </div>
                                    </div>
                                    {{-- search input --}}
                                   <div class="flex border-b border-gray-500 pb-1">
                                    <div class="mr-3">
                                        <span class=" text-lg text-gray-400 "><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                    <div>
                                        <input type="text" class=" bg-gray-900 text-gray-200 outline-none " placeholder="ডক অনুসন্ধান">
                                    </div>
                                   </div>
                                   {{-- search instraction --}}
                                   <div class="px-5 pt-6 pb-10">
                                    <p class=" text-gray-400 text-sm">
                                        ডকুমেন্টেশনে ফলাফল খুঁজে পেতে একটি অনুসন্ধান শব্দ লিখুন।
                                    </p>
                                   </div>
                                   {{-- search footer --}}
                                   <div class="text-right pb-2 pt-1 border-t border-black">
                                    <span class=" text-gray-400 text-sm"><span>লারা</span><span class=" text-base"> বাংলা</span></span>
                                   </div>
                                </div>
                            </div>
                        </div>
                        {{-- search body end --}}
                    </div>
                 {{-- search end --}}
                       <div :class="mobile_search ? 'blur-sm' : ''">
                        {!! $data !!}
                       </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3 bg-blue-50 mt-8">
                   {{-- version start --}}
                   <div class="hidden md:block" x-data="{ doc_version: false }">

                    <div class="text-center pt-2 border-b pb-2 bg-slate-100" @click="doc_version =! doc_version">
                        <label class=" text-lg font-medium text-gray-600">Version<span class="ml-4"><i class="fa-solid fa-caret-down"></i></span></label>
                    </div>

                    <div class=" w-28 mx-auto  " x-show="doc_version" @click.outside="doc_version = false">
                        <ul class="bg-white absolute py-3 z-20 border rounded-b-md">
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">Master</span></a></li>
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">9.x</span></a></li>
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">8.x</span></a></li>
                            <li class=" list-none hover:bg-gray-200 px-5"><a href="#" ><span class=" text-gray-700">7.x</span></a></li>
                        </ul>
                    </div>
                </div>
                 {{-- version end --}}
                    <div>

                    </div>
                </div>
           </div>
        </div>
    </div>
</section>
@endsection
