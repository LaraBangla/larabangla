@extends('frontend.header_footer')

@section('content')
<section class="docs">
    <div class="container mx-auto">
        <div class="">
           <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 md:col-span-9">
                    <div class="mx-5 md:pl-10  md:pr-5 mt-8 leading-20">
                    {{-- version start for mobile --}}
                   <div class=" md:block" x-data="{ doc_version: false }">

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
                    <div class="mt-2 rounded-md mx-3">
                        <div class="flex py-3 bg-white px-4">
                            <div>
                                <span class=" text-xl font-thin text-gray-500 pr-4"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                            <div>
                                <span class=" text-lg text-gray-500">Search</span>
                            </div>
                        </div>
                    </div>

                    <div class=" fixed top-10 right-0   w-screen">
                        <div class=" pt-5 bg-gray-900 h-32  mx-5">
                            <div class="px-3">
                               <div class=" border-b border-gray-500 pb-1">
                                <span class=" text-lg text-gray-200 mr-3"><i class="fa-solid fa-magnifying-glass"></i></span> <input type="text" class=" bg-gray-900 border-none" placeholder="Search Docs">
                               </div>
                            </div>
                        </div>

                        aaaaa
                    </div>
                 {{-- search end --}}
                        {!! $data !!}
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
