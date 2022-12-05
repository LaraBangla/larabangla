@extends('backend.backend_header_footer', ['title' => 'Show Version || '.$find->name])

@section('content')
<section class="docs">
    <div class="mx-6 mt-3">
        {!! $data !!}
    </div>
</section>
@endsection
