<div>
    <div>
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
                            @endif
                            class="text-base font-bold ml-3" wire:click="get_technology({{ $row->id }})">{{ $row->name }}</option>
                        @endforeach
                    </select>
                        @error('division')
                            <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mt-4">
                    <label for="division" class="font-bold text-lg">Select Technology *</label> <br>
                    <select name="technology" id="technology" class="w-1/3 py-3">
                        <option value=""
                        @if (old('technology') == null)
                        selected
                        @endif
                        disabled class=" text-base font-bold ml-3">Select</option>

                        @if (isset($technologies) && $technologies != null)
                            @foreach ($technologies as $row)
                            <option value="{{ $row->id }}"
                                @if (old('technologies') == $row->id)
                                    selected
                                @endif
                                class="text-base font-bold ml-3">{{ $row->name }}</option>
                            @endforeach
                        @endif

                    </select>
                        @error('technology')
                            <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                        @enderror
                </div>
    </div>
</div>
