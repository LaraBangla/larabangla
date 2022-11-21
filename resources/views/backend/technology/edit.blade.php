@extends('backend.backend_header_footer', ['title' => 'Edit Technology'])

@section('content')
<section>
    <div class="container mx-auto bg-gray-100 rounded-lg mt-10 ">
        <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Edit Technology</h1>
        <a href="{{ route('admin.show.technologies') }}" class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">All Technologies</a>
        <div class="p-5">
            <form action="{{ route('admin.update.technology',$find->id) }}" method="post">
                @csrf
                @method('patch')
                <div>
                <label for="name" class="font-bold text-lg">Technology Name</label> <br/>
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

                <div class="mt-4">
                    <label for="division" class="font-bold text-lg">Select Division *</label> <br>
                    <select name="division" id="division" class="w-1/3 py-3">
                        <option value=""
                        @if (old('division') == null)
                        selected
                        @endif
                        disabled class=" text-base font-bold ml-3">Select</option>

                        @foreach ($division as $row)
                        <option value="{{ $row->id }}"
                            @if (old('division') == $row->id)
                                selected
                            @elseif ($row->id == $find->technology_division_id)
                                selected
                            @endif
                            class="text-base font-bold ml-3">{{ $row->name }}</option>
                        @endforeach
                    </select>
                        @error('division')
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
