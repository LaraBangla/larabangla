@extends('backend.backend_header_footer', ['title' => 'Add Chapter'])

@section('content')
<section>
    <div class="container mx-auto bg-gray-100 rounded-lg mt-10">
        <div class="p-5">
            <div class=" mb-5">
                <a class=" text-lg bg-slate-200 p-2 rounded-lg hover:bg-slate-300" href="{{ route('admin.show.version', $version->id) }}">< Back</a>
            </div>
            <form action="{{ route('admin.store.chapter', Crypt::encryptString($version->id)) }}" method="post">
                @csrf
                @method('put')
                <div>
                <label for="name" class="font-bold text-lg">Chapter Name *</label> <br/>
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="w-1/3 py-3" />
                    @error('name')
                        <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-5">
                    <label for="slug" class="font-bold text-lg">Slug *</label> <br/>
                    <input type="text" name="slug" value="{{ old('slug') }}" id="slug" class="w-1/3 py-3" />
                        @error('slug')
                            <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                        @enderror
                    </div>
                <button type="submit" class="mt-10 px-5 py-3 bg-gray-200 uppercase rounded-lg font-bold hover:bg-gray-300  ">ADD Chapter</button>
            </form>
        </div>
    </div>
</section>
@endsection
