@extends('frontend.header_footer')

@section('title')টিউটোরিয়াল টেকনোলজি সমূহ - লারা বাংলা @endsection
@section('description')টিউটোরিয়াল টেকনোলজি সমূহ @endsection
@section('pagename')টিউটোরিয়াল টেকনোলজি সমূহ @endsection
@section('that_url'){{ Request::url(); }}@endsection

@section('content')
  <div>
    @include('frontend.more.technologies')
    </div>
@endsection
