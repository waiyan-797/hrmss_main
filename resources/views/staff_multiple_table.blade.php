<div class="w-full overflow-x-auto">
    <table class="table-auto w-full text-sm rounded-lg">
        <thead class="font-arial text-xs text-center text-gray-900 uppercase bg-gray-50 font-semibold">
            <tr>
                @foreach ($column_names as $name)
                    <th scope="col" class="px-4 py-2 min-w-[120px] text-gray-700">
                        {{ $name }}
                    </th>
                @endforeach
                <th scope="col" class="px-4 py-2 min-w-[80px] text-gray-700"></th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($column_vals as $index => $val)
                <tr class="font-arial bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach ($column_types as $type)
                        <td class="px-4 py-4 min-w-[300px] text-gray-500 dark:text-gray-300">
                            @if ($type['type'] == 'select')
                                @if ($type['next_col_update'] && !is_string($type['select_values']))
                                    <x-select
                                        wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                        wire:change="handleCustomColumnUpdate('{{$type['wire_array_name']}}', {{ $index }}, '{{ $type['next_col_update'] }}', '{{ $type['ini_array'] }}', $event.target.value)"
                                        id="{{$type['wire_array_key']}}"
                                        name="{{$type['wire_array_key']}}"
                                        class="block w-full p-2 text-sm border rounded"
                                        :values="$type['select_values']"
                                        placeholder="Select..."
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @elseif ($type['next_col_update'] && is_string($type['select_values']))
                                    <x-select
                                        wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                        wire:change="handleCustomColumnUpdate('{{$type['wire_array_name']}}', {{ $index }}, '{{ $type['next_col_update'] }}', '{{ $type['ini_array'] }}', $event.target.value)"
                                        id="{{$type['wire_array_key']}}"
                                        name="{{$type['wire_array_key']}}"
                                        class="block w-full p-2 text-sm border rounded"
                                        :values="$this->{$type['wire_array_name']}[$index][$type['select_values']]"
                                        placeholder="Select..."
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @elseif (!$type['next_col_update'] && is_string($type['select_values']))
                                    <x-select
                                        wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                        id="{{$type['wire_array_key']}}"
                                        name="{{$type['wire_array_key']}}"
                                        class="block w-full p-2 text-sm border rounded"
                                        :values="$this->{$type['wire_array_name']}[$index][$type['select_values']]"
                                        placeholder="Select..."
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @else
                                    <x-select
                                        wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                        id="{{$type['wire_array_key']}}"
                                        name="{{$type['wire_array_key']}}"
                                        class="block w-full p-2 text-sm border rounded"
                                        :values="$type['select_values']"
                                        placeholder="Select..."
                                    />
                                    <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                                @endif
                            @elseif ($type['type'] == 'search_select')
                                <x-searchable-select
                                    placeholder="Select..."
                                    :values="$type['select_values']"
                                    property="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    class="block w-full p-2 text-sm border rounded font-arial"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'text' || $type['type'] == 'number' || $type['type'] == 'date')
                                <x-text-input
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    id="{{$type['wire_array_key']}}"
                                    name="{{$type['wire_array_key']}}"
                                    type="{{$type['type']}}"
                                    class="block w-full p-2 text-sm border rounded"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'file')
                                <x-input-file
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    id="{{$type['wire_array_key']}}"
                                    name="{{$type['wire_array_key']}}"
                                    type="{{$type['type']}}"
                                    file="{{$this->getWireValue($type['wire_array_name'], $index, $type['wire_array_key'])}}"
                                    class="block w-full text-sm border mb-1 rounded"
                                    accept=".pdf"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'checkbox')
                                <input
                                    wire:model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    type="checkbox"
                                    class="form-checkbox h-4 w-4 text-indigo-600"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @elseif ($type['type'] == 'multiple-select')
                                <x-multiple-select
                                    model="{{$type['wire_array_name']}}.{{ $index }}.{{$type['wire_array_key']}}"
                                    class="block w-full text-sm border rounded"
                                    placeholderValue="Select..."
                                    :options="$type['select_values']"
                                />
                                <x-input-error class="mt-2" :messages="$errors->get($type['wire_array_name'] . '.' . $index . '.' . $type['wire_array_key'])"/>
                            @endif
                        </td>
                    @endforeach
                    <td class="px-4 py-2 min-w-[80px]">
                        <button type="button" wire:click="{{$del_method}}({{ $index }})"
                            class="font-medium text-red-600 hover:underline">
                            Remove
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
