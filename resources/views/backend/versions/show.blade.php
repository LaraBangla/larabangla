@extends('backend.backend_header_footer', ['title' => 'Show Version || '.$find->name])

@section('content')
<section>
    <div class="container mx-auto bg-gray-100 rounded-lg mt-10 pb-10 ">
        <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Show Version</h1>
        <a href="{{ route('admin.show.technology', $find->technology_id) }}" class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">< Back</a>
        <div class="p-5">
            <p><span class=" font-bold">Technology Name:</span> <span>{{ $find->technology->name }}</span></p>
            <p><span class=" font-bold">Version Name:</span> <span>{{ $find->name }}</span></p>
            <p><span class=" font-bold">Version Slug:</span> <span>{{ $find->slug }}</span></p>
        </div>
        <div class=" border-t">
            <h3 class=" font-bold text-xl ml-5">Chapters</h3>
        <a href="{{ route('admin.add.chapter', Crypt::encryptString($find->id)) }}" class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">Add Chapter</a>
            <ul class="ml-5 text-lg pt-10">
                @foreach ($chapters as $chapter)
                <li class=" my-10 border py-10 pl-5 flex justify-between">
                    <div>
                        <p class=" text-xl font-semibold">{{ $chapter->name }}</p>
                    <p class=" text-gray-500">{{ $chapter->slug }}</p>
                    </div>
                    <div class="mr-2">
                        <a href="{{ route('admin.show.chapter',Crypt::encryptString($chapter->id)) }}" class="p-2 text-lg bg-sky-600 text-white mx-1 rounded-sm"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.edit.chapter',Crypt::encryptString($chapter->id)) }}" class="p-2 text-lg bg-green-700 text-white mx-1 rounded-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('admin.delete.chapter',Crypt::encryptString($chapter->id)) }}" onclick="return confirm('Are you sure?')" class="p-2 text-lg bg-red-700 text-white mx-1 rounded-sm"><i class="fa-solid fa-trash"></i></a>
                    </div>
                </li>
                @endforeach


            </ul>
        </div>
    </div>
</section>
@endsection
