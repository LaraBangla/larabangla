@extends('frontend.header_footer')

@section('title')Contact @endsection
@section('description')Contact us @endsection
@section('pagename')Contact @endsection
@section('that_url'){{ Request::url(); }}@endsection

@section('content')
{{-- contact section --}}
<section>
<div class="container mx-auto">
    {{-- Breadcrumb --}}
    <div class=" py-8   bg-gradient-to-r from-slate-100 via-gray-300 to-slate-50 shadow-md shadow-gray-500/50 mt-20 mx-5 lg:mx-64  rounded-md">
        <h1 class=" text-center font-semibold text-lg text-slate-800">যোগাযোগ</h1>
    </div>
    {{-- Breadcrumb end--}}

    {{-- contact form --}}
        <div class=" mt-10 p-5 md:y-8 md:px-8 md:mx-20 xl:mx-64 mx-3 sm:mx-0 lg:p-16  border rounded">
            <form action="{{ route('contact.store') }}" method="post">
                @csrf
                @method('put')
                <div class=" grid grid-cols-12 gap-3 lg:gap-10">
                        <div class=" col-span-12 md:col-span-6 mt-5 md:mt-0 ">
                         
                              <input type="text" id="name" name="name" placeholder="নাম *" class=" w-full border-b-1 bg-gray-50 border-x-transparent  border-t-transparent focus:border-x-transparent focus:border-t-transparent focus:border-b-slate-600 focus:ring-0">
                            @error('name')
                              <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
                            @enderror
                            </div>
                    
                        <div class=" col-span-12 md:col-span-6 mt-5 md:mt-0 ">
                         
                            <input type="text" id="email" name="email" placeholder="ইমেইল ঠিকানা *" class=" w-full border-b-1 bg-gray-50 border-x-transparent  border-t-transparent focus:border-x-transparent focus:border-t-transparent focus:border-b-slate-600 focus:ring-0">
                            @error('email')
                            <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
                          @enderror
                        </div>
                      <div class=" col-span-12  mt-5 md:mt-0 ">
                         
                        <input type="text" id="mobile" name="mobile" placeholder="মোবাইল নাম্বার" class=" w-full border-b-1 bg-gray-50 border-x-transparent  border-t-transparent focus:border-x-transparent focus:border-t-transparent focus:border-b-slate-600 focus:ring-0">
                        @error('mobile')
                        <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
                      @enderror
                    </div>
                      <div class=" col-span-12 mt-5 md:mt-0 ">
                         
                        <input type="text" id="subject" name="subject" placeholder="বিষয় *" class=" w-full border-b-1 bg-gray-50 border-x-transparent  border-t-transparent focus:border-x-transparent focus:border-t-transparent focus:border-b-slate-600 focus:ring-0">
                        @error('subject')
                        <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
                      @enderror
                    </div>

                  
                  <div class=" col-span-12  mt-5 md:mt-0 ">
                   
                      <textarea id="name" name="message"
                      x-data="{ resize: () => { $el.style.height = '5px'; $el.style.height = $el.scrollHeight + 'px' } }"
                      @input="resize()"
                      placeholder="বার্তা *" 
                      class=" w-full border-b-1 bg-gray-50 border-x-transparent  border-t-transparent focus:border-x-transparent focus:border-t-transparent focus:border-b-slate-600 focus:ring-0"></textarea>
                      @error('message')
                      <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    </div>

                </div>
                <div class="mt-5 -ml-4 sm:ml-0">
                    <div>
                        {!! NoCaptcha::renderJs('bn', false, 'onloadCallback') !!}
                        {!! NoCaptcha::display() !!}
                   </div>
                   @error('g-recaptcha-response')
                   <div class="mt-1 font-light text-sm text-red-500">{{ $message }}</div>
                 @enderror
                  </div>
                <div class="mt-12">
                    <button type="submit" class=" bg-gradient-to-r from-slate-300 via-gray-300 to-slate-200 shadow-md shadow-gray-500/50 px-10 py-5 rounded font-medium text-slate-800">বার্তা পাঠান</button>
                </div>
           
            </form>
        </div>
    {{-- contact form end --}}
</div>
</section>
{{-- contact section end--}}
@endsection

@push('scripts')
<script type="text/javascript">
    var onloadCallback = function() {
      alert("grecaptcha is ready!");
    };
  </script>
@endpush