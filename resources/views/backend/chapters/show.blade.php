@extends('backend.backend_header_footer', ['title' => 'Show Chapter || ' . $find->name])

@section('content')
    <section>
        <div class="container mx-auto bg-gray-100 rounded-lg mt-10 pb-10 ">
            <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Show Chapter</h1>
            <a href="{{ route('admin.show.version', ['technology_id' => Crypt::encryptString($find->technology->id), 'version_id' => Crypt::encryptString($find->version->id)]) }}"
                class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">
                < Back</a>
                    <div class="p-5">
                        <p><span class=" font-bold">Chapter Name:</span> <span>{{ $find->name }}</span></p>
                        <p><span class=" font-bold">Chapter Slug:</span> <span>{{ $find->slug }}</span></p>
                    </div>
                    <div class=" border-t">
                        <h3 class=" font-bold text-xl ml-5">Lessons</h3>
                        <a href="{{ route('admin.add.lesson', Crypt::encryptString($find->id)) }}"
                            class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">Add
                            Lesson</a>
                        <ul class="ml-5 text-lg pt-10">
                            @foreach ($find->lessons as $lesson)
                                <li class=" my-10 border py-5 pl-5">
                                    <a href="#">{{ $lesson->name }}</a>
                                    <div class=" float-right">
                                        <a href="{{ route('admin.show.lesson', Crypt::encryptString($lesson->id)) }}"
                                            class="p-2 text-lg bg-sky-600 text-white mx-1 rounded-sm"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('admin.edit.lesson', Crypt::encryptString($lesson->id)) }}"
                                            class="p-2 text-lg bg-green-700 text-white mx-1 rounded-sm"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{ route('admin.delete.lesson', Crypt::encryptString($lesson->id)) }}"
                                            onclick="return confirm('Are you sure?')"
                                            class="p-2 text-lg bg-red-700 text-white mx-1 rounded-sm"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
        </div>
    </section>
@endsection
