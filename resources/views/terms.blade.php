@extends('frontend.header_footer')
@section('title')
পরিষেবার শর্তাবলী - লারা বাংলা
@endsection
@section('content')
<section>
    <div class="container mx-auto md:pb-20 md:pt-10 py-5 ">
       <div class="mx-3 md:mx-16 lg:mx-40 border rounded px-5 md:px-10 leading-8 py-10 shadow-md">
        <div>
        </div>
            <div class=" content text-justify">
            {!! $terms !!}
            </div>
       </div>
    </div>
</section>
@endsection
