@extends('backend.backend_header_footer', ['title' => 'Edit Technology'])

@section('content')
<section>
    <div class="container mx-auto bg-gray-100 rounded-lg mt-10 pb-10 ">
        <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Edit Technology</h1>
        <a href="#" class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">All Technologies</a>
        <div class="p-5">
            <p><span class=" font-bold">Technology Name:</span> <span>{{ $find->name }}</span></p>
            <p><span class=" font-bold">Technology Slug:</span> <span>{{ $find->slug }}</span></p>
        </div>
        <div class=" border-t">
            <h3 class=" font-semibold text-lg ml-3">Versions</h3>
        <a href="#" class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">Add Version</a>
            <ul class="ml-5 text-lg">
                @foreach ($versions as $version)
                <li><a href="#">{{ $version->name }}</a></li>
                @endforeach


            </ul>
        </div>
    </div>
</section>
@endsection
