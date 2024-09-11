<table class="w-full text-sm rounded-lg">
    <thead class="font-arial text-xs text-center text-gray-900 uppercase bg-gray-50 font-semibold">
        <tr>
            @foreach ($column_names as $name)
                <th scope="col" class="px-6 py-3">{{$name}}</th>
            @endforeach
            <th scope="col" class="px-6 py-3">
                <button wire:click='{{$add_event}}' type="button" class="text-blue-500 bg-transparent border border-gray-300 hover:bg-blue-200 hover:text-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:text-blue-800 dark:border-gray-200 dark:hover:text-blue-700 dark:focus:ring-blue-700 dark:hover:bg-blue-200 dark:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <span class="sr-only">Add Icon</span>
                </button>
            </th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($column_vals as $index => $val)
            <tr class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach ($column_types as $type)
                    <td class="px-2 py-4 text-gray-500 dark:text-gray-300">
                        @if ($type['type'] == 'select')
                            <x-select
                                wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                :values="$type['select_values']"
                                placeholder="Select an Option..."
                                class="mt-1 block w-full"
                                required
                            />
                        @elseif ($type['type'] == 'text' || $type['type'] == 'number' || $type['type'] == 'date' || $type['type']=='file')
                            <x-text-input
                                wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                id="{{$type['wire_array_key']}}"
                                name="{{$type['wire_array_key']}}"
                                type="{{$type['type']}}"
                                class="mt-1 block w-full"
                                required
                            />
                        @endif
                        
                    </td>
                    
                @endforeach
                <td class="px-6 py-4">
                    <button type="button" wire:click="{{$del_method}}({{ $index }})" class="font-medium text-red-600 hover:underline">Remove</button>
                </td>
            </tr>
        @endforeach
    
            </form>
        </td>
    </tr>
    {{-- <tr>
        <td colspan="{{ count($column_names) + 1 }}" class="px-2 py-4 text-gray-500 dark:text-gray-300">
            <form wire:submit.prevent="submitForm" class="space-y-4">
                <!-- Certificate Upload -->
                <div>
                    <x-input-file wire:model="certificate" id="certificate" accept=".pdf" name="certificate"/>
                    <x-input-error class="mt-1" :messages="$errors->get('certificate')" />
                </div>

                <!-- Exam Mark Input -->
                <div>
                    <x-text-input wire:model="exam_mark" id="exam_mark" name="exam_mark" type="number" class="mt-1 block w-full" required />
                    <x-input-error class="mt-1" :messages="$errors->get('exam_mark')" />
                </div>
            </td>
            </tr> --}}
    </tbody>
</table>
