<div class="w-full overflow-x-auto">
    <table class="table-auto w-[200%] text-sm rounded-lg">
        <thead class="font-arial text-xs text-center text-gray-900 uppercase bg-gray-50 font-semibold">
            <tr>
                @foreach ($column_names as $name)
                    <th scope="col" class="px-6 py-3 {{ count($column_names) > 12 ? 'w-[' . (int)(200 / count($column_names)) . '%]' : 'w-' . (int)(1 / count($column_names)) }}">
                        {{$name}}
                    </th>
                @endforeach

                <th scope="col" class="px-6 py-3 {{ count($column_names) > 12 ? 'w-[' . (int)(200 / count($column_names)) . '%]' : 'w-' . (int)(1 / count($column_names)) }}"></th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($column_vals as $index => $val)
                <tr class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach ($column_types as $type)
                        <td class="px-2 py-4  {{ count($column_names) > 12 ? 'w-[' . (int)(200 / count($column_names)) . '%]' : 'w-' . (int)(1 / count($column_names)) }} text-gray-500 dark:text-gray-300">
                            @if ($type['type'] == 'select')
                                <x-searchable-select
                                    property="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    :values="$type['select_values']"
                                    placeholder="Select an Option..."
                                    class="mt-1 block w-full h-40"
                                    isHighNeeded=true
                                    err="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
<<<<<<< Updated upstream
                                    
=======


>>>>>>> Stashed changes
                                />
                            @elseif ($type['type'] == 'text' || $type['type'] == 'number'|| $type['type']=='file')
                                <x-text-input
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    id="{{$type['wire_array_key']}}"
                                    name="{{$type['wire_array_key']}}"
                                    type="{{$type['type']}}"
                                    class="mt-1 block w-full"
                                    err="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
                                />
                                @elseif($type['type'] == 'date' )

                                <x-date-picker
                                
                                
                                wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"

                                err="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"

                                />
                            @elseif ($type['type'] == 'checkbox')
                                <x-text-input
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    id="{{$type['wire_array_key']}}"
                                    name="{{$type['wire_array_key']}}"
                                    type="checkbox"
                                    class="form-checkbox h-4 w-4 text-indigo-600"

                                />
                            
                            @elseif ($type['type'] == 'multiple-select')
                            
                            <x-multiple-select
                            property="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                            :values="$type['select_values']"
                            placeholder="Select an Option..."
                            class="mt-1 block w-full h-40"
                            isHighNeeded=true
                        />
                        
                            @endif


                            
                        </td>
                    @endforeach
                    <td class="px-6 py-4 {{ count($column_names) > 12 ? 'w-[' . (int)(200 / count($column_names)) . '%]' : 'w-' . (int)(1 / count($column_names)) }}">
                        <button type="button" wire:click="{{$del_method}}({{ $index }})" class="font-medium text-red-600 hover:underline">Remove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
