<div class="container mx-auto
@if (Request::route()->getName() == '/')
mt-32  md:py-5
@endif
">
    <div>
        @if (Request::route()->getName() == '/')
        <div class="text-center pt-0 md:pt-10 pb-8 md:pb-20 ">
            <span class=" text-2xl font-bold text-green-600 border-b border-green-400">টিউটোরিয়াল  সমূহ</span>
        </div>
        @else
        <div class="mt-8 mb-14">
            @include('frontend.more.breadcrumb',['breadcrumb' => 'টিউটোরিয়াল  সমূহ'])
        </div>
        @endif

        <div class="grid grid-cols-12  p-3 gap-5 md:gap-7 lg:gap-10">
          @foreach ($boot_tech as $tech)
            <div class="col-span-6 mt-3 md:col-span-6 md:mt-0 lg:col-span-3
            @if (Request::route()->getName() == '/')
            bg-gray-700
            shadow shadow-green-800 hover:shadow hover:shadow-green-500
            @else
            bg-white
            shadow shadow-gray-300 hover:shadow hover:shadow-gray-400
            @endif
             sm-4 sm:mx-8 md:mx-14 lg:mx-10 xl:mx-20 rounded-md ">
               <div >
                <a href="{{ route('send.to.docs',$tech->slug) }}">
                    <div class="  h-36 ">
                        <div class="">
                            <img class="h-12 block mx-auto mt-10" src="{{ asset('storage/tech_images/'.$tech->image) }}" alt="Technology">
                          </div>
                          <div class="mt-8 text-center">
                            <p class=" font-bold text-lg
                            @if (Request::route()->getName() == '/')
                            text-green-500
                            @else
                            text-gray-500
                            @endif
                            ">{{$tech->name}}</p>
                          </div>
                    </div>
                     </a>
               </div>
              </div>
              @endforeach
        </div>
      </div>
</div>
