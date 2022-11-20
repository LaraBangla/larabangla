@extends('backend.backend_header_footer', ['title' => 'Edit Devision'])

@section('content')
<section>
    <div class="container mx-auto bg-gray-100 rounded-lg mt-10 ">
        <div class="p-5">
            <form action="{{ route('admin.update.division',$find->id) }}" method="post">
                @csrf
                @method('patch')
                <div>
                <label for="name" class="font-bold text-lg">Devision Name</label> <br/>
                <input type="text" name="name"
                @if (old('name') != null)
                value="{{ old('name') }}"
                @else
                    value="{{ $find->name }}"
                @endif
                id="name" class="w-1/3 py-3" required/>
                @error('name')
                    <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                @enderror
                </div>

                <div class="mt-5">
                <label for="slug" class="font-bold text-lg">Slug</label> <br/>
                <input type="text" name="slug"
                @if (old('slug') != null)
                value="{{ old('slug') }}"
                @else
                    value="{{ $find->slug }}"
                @endif
                id="slug" class="w-1/3 py-3" required />
                @error('slug')
                <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                @enderror
                </div>

                <button type="submit" class="mt-10 px-5 py-3 bg-gray-200 uppercase rounded-lg font-bold hover:bg-gray-300  ">Update Devision</button>
            </form>
        </div>
    </div>
</section>
@endsection
