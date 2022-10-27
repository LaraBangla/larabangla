@extends('frontend.header_footer')
@section('content')
<section class="docs">
    <div class="container mx-auto">
        <div class="">
           <div class="grid grid-cols-12 gap-3">
                <div class="col-span-9">
                    <div class="pl-10 pr-5 mt-8 leading-20">
                        {!! $data !!}
                    </div>
                </div>
                <div class="col-span-3 bg-blue-50 mt-8">

                </div>
           </div>
        </div>
    </div>
</section>
@endsection
