@foreach ($data as $key => $row)
<tr>
  <td class="border border-slate-300 p-2 text-center">{{ $key + 1 }}</td>
  <td class="border border-slate-300 p-2">{{ $row->name }}</td>
  <td class="border border-slate-300 p-2">{{ $row->slug }}</td>
  <td class="border border-slate-300 p-2">{{ $row->division->name }}</td>
  <td class="w-40 border border-slate-300 p-2">
    {{-- show technology --}}
    <a class="mx-1 rounded-sm bg-sky-600 p-2 text-lg text-white" href="{{ route('admin.show.technology', $row->slug) }}"><i
         class="fa-solid fa-eye"></i></a>
         {{-- edit technology --}}
    <a class="mx-1 rounded-sm bg-green-700 p-2 text-lg text-white" href="{{ route('admin.edit.technology', $row->slug) }}"><i
         class="fa-solid fa-pen-to-square"></i></a>
         {{-- delete technology --}}
    <a class="mx-1 rounded-sm bg-red-700 p-2 text-lg text-white" href="{{ route('admin.delete.technology', $row->slug) }}"
       onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
  </td>
</tr>
@endforeach